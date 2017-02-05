<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Enum\BagType;
use App\Enum\CraftingType;

class Character
{

    public function process($line, $user) {
        $item_start = stripos($line, 'CHARACTER:');
        if($item_start === false) {
            return false;
        }

        $line = str_ireplace('",', '', $line);
        $line = substr($line, $item_start + 10);

        $properties = explode(';', $line);

        $character = $user->characters->where('externalId', $properties[0])->first();

        if(!$character) {
            $character = new \App\Model\Character();
        }

        $character->name = $properties[1];
        $character->externalId = $properties[0];
        $character->classId = $properties[3];
        $character->level = $properties[4];
        $character->championLevel = $properties[5];
        $character->raceId = $properties[7];
        $character->allianceId = $properties[8];
        $character->userId = $user->id;
        $character->deleted_at = null;
        $character->currency = intval($properties[12]);
        $character->account = $properties[15];
        $character->server = $properties[14];
        $character->lang = isset($properties[18]) ? trim(preg_replace('/\s\s+/', ' ', $properties[18])) : config('constants.default-language');

        if(isset($properties[13])) {
            $smithingSkills = explode('-', $properties[13]);

            if($character->getMeta('max_smithing_' . CraftingType::BLACKSMITHING) != intval($smithingSkills[1])) {
                $character->setMeta('max_smithing_' . CraftingType::BLACKSMITHING, intval($smithingSkills[1]));
            }

            if($character->getMeta('max_smithing_' . CraftingType::CLOTHIER) != intval($smithingSkills[1])) {
                $character->setMeta('max_smithing_' . CraftingType::CLOTHIER, intval($smithingSkills[1]));
            }

            if($character->getMeta('max_smithing_' . CraftingType::WOODWORKING) != intval($smithingSkills[2])) {
                $character->setMeta('max_smithing_' . CraftingType::WOODWORKING, intval($smithingSkills[2]));
            }
        }

        if(isset($properties[11])) {
            $roles = explode('-', $properties[11]);
            $character->isDPS = $roles[0] == 'true';
            $character->isHealer = $roles[1] == 'true';
            $character->isTank = $roles[2] == 'true';
        }

        $character->ridingUnlocked_at = null;
        if(isset($properties[9])) {
            // Calculate when next riding lesson is unlocked
            $seconds = intval($properties[9]) / 1000;
            $nextTraining = intval($properties[10]) + $seconds;
            $character->ridingUnlocked_at = $nextTraining;
        }

        if(isset($properties[16])) {
            $character->setMeta('bag_' . BagType::BACKPACK, intval($properties[16]));
            $currentBank = $user->getMeta('bag_' . BagType::BANK);
            if(intval($currentBank) != intval($properties[17])) {
                $user->setMeta('bag_' . BagType::BANK, intval($properties[17]));
            }
        }

        $character->save();

        return true;
    }
}
