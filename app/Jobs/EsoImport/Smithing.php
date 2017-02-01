<?php namespace App\Jobs\EsoImport;

use App\Enum\ImportType;
use App\Model\CraftingTrait;
use App\Model\ImportRow;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class Smithing implements ShouldQueue
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
        $import->type = ImportType::SMITHING;
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

        $info = explode(';', $import->row);
        $character = $import->user->characters->where('externalId', $info[1])->first();
        $smithingType = intval($info[3]);

        $craftingTrait = $character->craftingTraits->where('craftingTypeEnum', $smithingType)
            ->where('traitId', intval($info[7]))
            ->where('researchLineIndex', intval($info[4]))
            ->where('traitIndex', intval($info[5]))
            ->first();

        if(is_null($craftingTrait)) {
            $craftingTrait = new CraftingTrait();
            $craftingTrait->characterId = $character->id;
            $craftingTrait->craftingTypeEnum = $smithingType;
            $craftingTrait->traitId = intval($info[7]);
            $craftingTrait->researchLineIndex = intval($info[4]);
            $craftingTrait->traitIndex = intval($info[5]);
            $craftingTrait->name = $info[10];
            $craftingTrait->image = $info[11];
            $craftingTrait->isKnown = stripos($info[9], 'true') !== false;
            $craftingTrait->save();
        }

        if(isset($info[13]) and $info[2] !== 'nil') {
            $researchDone = intval($info[13]) + intval($info[2]);
            $craftingTrait->researchDone_at = Carbon::createFromTimestamp($researchDone);
            $craftingTrait->save();
        }

        $import->delete();
    }

}
