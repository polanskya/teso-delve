<?php

namespace App\Jobs\EsoImport;

use App\Enum\BagType;
use App\Enum\CraftingType;
use App\Enum\ImportType;
use App\Model\ImportRow;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Character implements ShouldQueue
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
        $import->type = ImportType::CHARACTER;
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

        $item_start = stripos($import->row, 'CHARACTER:');
        $line = str_ireplace('",', '', $import->row);
        $line = substr($line, $item_start + 10);

        $properties = explode(';', $line);

        $character = $import->user->characters->where('externalId', $properties[0])->first();

        if (! $character) {
            $character = new \App\Model\Character();
        }

        $character->name = $properties[1];
        $character->externalId = $properties[0];
        $character->classId = $properties[3];
        $character->level = $properties[4];
        $character->championLevel = $properties[5];
        $character->raceId = $properties[7];
        $character->allianceId = $properties[8];
        $character->userId = $import->user->id;
        $character->deleted_at = null;
        $character->currency = intval($properties[12]);
        $character->account = $properties[15];
        $character->server = $properties[14];
        $character->lang = isset($properties[18]) ? trim(preg_replace('/\s\s+/', ' ', $properties[18])) : config('constants.default-language');

        $lang = isset($properties[18]) ? trim(preg_replace('/\s\s+/', ' ', $properties[18])) : config('constants.default-language');
        if ($import->user->lang != $lang) {
            $import->user->lang = $lang;
            $import->user->save();
        }

        if (isset($properties[13])) {
            $smithingSkills = explode('-', $properties[13]);

            if ($character->getMeta('max_smithing_'.CraftingType::BLACKSMITHING) != intval($smithingSkills[1])) {
                $character->setMeta('max_smithing_'.CraftingType::BLACKSMITHING, intval($smithingSkills[1]));
            }

            if ($character->getMeta('max_smithing_'.CraftingType::CLOTHIER) != intval($smithingSkills[1])) {
                $character->setMeta('max_smithing_'.CraftingType::CLOTHIER, intval($smithingSkills[1]));
            }

            if ($character->getMeta('max_smithing_'.CraftingType::WOODWORKING) != intval($smithingSkills[2])) {
                $character->setMeta('max_smithing_'.CraftingType::WOODWORKING, intval($smithingSkills[2]));
            }
        }

        if (isset($properties[11])) {
            $roles = explode('-', $properties[11]);
            $character->isDPS = $roles[0] == 'true';
            $character->isHealer = $roles[1] == 'true';
            $character->isTank = $roles[2] == 'true';
        }

        $character->ridingUnlocked_at = null;
        if (isset($properties[9])) {
            // Calculate when next riding lesson is unlocked
            $seconds = intval($properties[9]) / 1000;
            $nextTraining = intval($properties[10]) + $seconds;
            $character->ridingUnlocked_at = $nextTraining;
        }

        if (isset($properties[16])) {
            $character->setMeta('bag_'.BagType::BACKPACK, intval($properties[16]));
            $currentBank = $import->user->getMeta('bag_'.BagType::BANK);
            if (intval($currentBank) != intval($properties[17])) {
                $import->user->setMeta('bag_'.BagType::BANK, intval($properties[17]));
            }
        }

        $character->save();

        $import->delete();
    }
}
