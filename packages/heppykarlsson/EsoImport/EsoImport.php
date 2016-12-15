<?php namespace HeppyKarlsson\EsoImport;


use App\Enum\BagType;
use App\Model\Character;
use App\Model\Item;
use App\Model\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EsoImport
{

    private $characters = [];

    public function import($file_path) {
        Auth::user()->items()->delete();
        echo "Importing<br>";
        $file = fopen($file_path, 'r');

        $lines = [];

        if($file) {
            $line = null;
            while (!feof($file))
            {
                $lines[] = fgets($file);
            }
            fclose($file);
        }
        else {
            throw new \Exception('File couldnt be opened');
        }


        foreach($lines as $line) {
            $this->importCharacter($line);
        }

        Auth::user()->load('characters');

        foreach($lines as $line) {
            $this->importItem($line);
        }

        $this->cleanCharacters();

    }

    public function importCharacter($line) {
        $item_start = stripos($line, 'CHARACTER:');
        if($item_start === false) {
            return false;
        }

        $line = str_ireplace('",', '', $line);
        $line = substr($line, $item_start + 10);

        $properties = explode(';', $line);

        $character = Auth::user()->characters()->withTrashed()->where('externalId', $properties[0])->first();

        if(!$character) {
            $character = new Character();
        }

        $character->name = $properties[1];
        $character->externalId = $properties[0];
        $character->classId = $properties[3];
        $character->level = $properties[4];
        $character->championLevel = $properties[5];
        $character->raceId = $properties[7];
        $character->allianceId = $properties[8];
        $character->userId = Auth::user()->id;
        $character->deleted_at = null;

        if(isset($properties[11])) {
            $roles = explode('-', $properties[11]);
            $character->isDPS = $roles[0] == 'true';
            $character->isHealer = $roles[1] == 'true';
            $character->isTank = $roles[2] == 'true';
        }

        if(isset($properties[9])) {
            // Calculate when next riding lesson is unlocked
            $properties = explode(';', $line);
            $seconds = intval($properties[9]) / 1000;
            $nextTraining = intval($properties[10]) + $seconds;
            $character->ridingUnlocked_at = $nextTraining;
        }

        $character->save();

        $this->characters[] = $character->externalId;
    }

    public function cleanCharacters() {
        Auth::user()->characters()->where('userId', Auth::id())->whereNotIn('externalId', $this->characters)->delete();
    }

    public function importItem($line) {
        $item_start = stripos($line, 'ITEM:');
        if($item_start === false) {
            return false;
        }

        $line = str_ireplace('",', '', $line);
        $line = substr($line, $item_start + 5);

        $properties = explode(';', $line);

        $character = null;
        $bagType = isset($properties[15]) ? intval($properties[15]) : null;
        
        $character = Auth::user()->characters()->where('externalId', intval($properties[14]))->first();


        if(isset($bagType) and $bagType === BagType::BANK) {
            $character = null;
        }

        $item = new Item();
        $item->uniqueId = $properties[0];
        $item->userId = Auth::id();
        $item->name = $properties[1];
        $item->trait = $properties[2];
        $item->equipType = $properties[3];
        $item->quality = $properties[5];
        $item->armorType = $properties[6];
        $item->locked = $properties[7] == 'true';
        $item->enchant = $properties[8];
        $item->icon = $properties[9];
        $item->type = isset($properties[10]) ? intval($properties[10]) : null;
        $item->championLevel = isset($properties[11]) ? intval($properties[11]) : null;
        $item->level = isset($properties[12]) ? intval($properties[12]) : null;
        $item->weaponType = isset($properties[13]) ? intval($properties[13]) : null;
        $item->characterId = $character ? $character->id : null;
        $item->bagtypeId = $bagType;

        $item->isBound = (isset($properties[16]) and stripos($properties[16], 'true') !== false);

        if(!empty(trim($properties[4]))) {
            $set = Set::where('name', $properties[4])->first();

            if(!$set) {
                $set = new Set();
                $set->name = $properties[4];
                $set->save();
            }

            $item->setId = $set->id;
        }

        $item->save();

    }

}