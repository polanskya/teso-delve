<?php

namespace App\Jobs\EsoImport;

use App\Enum\ImportType;
use App\Enum\ItemStyleChapter;
use App\Model\CharacterItemStyle;
use App\Model\ImportRow;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ItemStyle implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $import_guid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($line, $user, $importGroup)
    {
        $import = new ImportRow();
        $import->guid = sha1($line);
        $import->user_id = $user->id;
        $import->import_group_guid = $importGroup;
        $import->type = ImportType::ITEMSTYLE;
        $import->row = trim($line);
        $import->save();

        $this->import_guid = $import->guid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $import = ImportRow::findOrFail($this->import_guid);

        $data = explode(';', $import->row);
        $externalId = intval($data[5]);
        $itemStyle = \App\Model\ItemStyle::where('externalId', $externalId)->first();

        if (is_null($itemStyle)) {
            $itemStyle = new \App\Model\ItemStyle();
            $itemStyle->externalId = $externalId;
            $itemStyle->name = '';
            $itemStyle->image = $data[4];
            $itemStyle->material = $data[3];
            $itemStyle->save();
        }

        $character = $import->user->characters->where('externalId', $data[1])->first();
        if (is_null($character)) {
            return true;
        }

        $chapterKnown = explode('-', $data[7]);
        $chapters = ItemStyleChapter::order();

        foreach ($chapterKnown as $key => $known) {
            if (stripos($known, 'true') !== false) {
                $characterItemStyle = CharacterItemStyle::firstOrNew([
                    'characterId' => $character->id,
                    'itemStyleId' => $itemStyle->id,
                    'itemStyleChapterEnum' => $chapters[$key],
                    'isKnown' => 1,
                ]);

                $characterItemStyle->save();
            }
        }

        $import->delete();
    }
}
