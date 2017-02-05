<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Enum\BagType;
use App\Enum\CraftingType;
use App\Model\CraftingTrait;
use Carbon\Carbon;

class Smithing
{

    public function process($line, $user) {
        if(stripos($line, 'SMITHING:') === false) {
            return false;
        }

        $info = explode(';', $line);

        $character = $user->characters->where('externalId', $info[1])->first();
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

        return true;
    }
}
