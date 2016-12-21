<?php namespace HeppyKarlsson\EsoImport;


use App\Enum\BagType;
use App\Model\Character;
use App\Model\Item;
use App\Model\Set;
use App\Model\UserItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EsoImport
{

    private $characters = [];
    private $items = null;

    public function import($file_path) {
//        Auth::user()->items()->delete();
        UserItem::where('userId', Auth::id())->delete();
        echo "Importing<br>";
        $file = fopen($file_path, 'r');

        $this->items = Item::all()->keyBy('itemLink');

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


        if(isset($properties[19])) {
            $item = Item::where('uniqueId', $properties[0])
                ->where('trait', $properties[2])
                ->where('quality', $properties[5])
                ->first();

            if(!$item) {
                $item = new Item();
                $item->uniqueId = $properties[0];
                $item->name = $properties[1];
                $item->equipType = $properties[3];
                $item->armorType = $properties[6];
                $item->quality = $properties[5];
                $item->icon = $properties[9];
                $item->type = intval($properties[10]);
                $item->championLevel = intval($properties[11]);
                $item->level = intval($properties[12]);
                $item->weaponType = intval($properties[13]);
                $item->itemLink = $properties[19];
                $item->trait = $properties[2];
                $item->traitDescription = $properties[21];
                $item->enchant = $properties[8];
                $item->enchantDescription = $properties[20];
                $item->itemValue = intval($properties[22]);


                if(!empty($properties[4])) {
                    $item->setItemSet($properties[4]);
                }

                $item->save();
            }

            if($item) {
                $userItem = new UserItem();
                $userItem->userId = Auth::id();
                $userItem->itemId = $item->id;
                $userItem->characterId = $character ? $character->id : null;
                $userItem->uniqueId = $properties[0];
                $userItem->traitEnum = $properties[2];
                $userItem->traitDescription = $properties[21];
                $userItem->enchant = $properties[8];
                $userItem->enchantDescription = $properties[20];
                $userItem->bagEnum = $bagType;

                $userItem->equipTypeEnum = $properties[3];
                $userItem->armorTypeEnum = $properties[6];
                $userItem->weaponTypeEnum = intval($properties[13]);
                $userItem->count = intval($properties[17]);

                $userItem->isBound = (isset($properties[16]) and stripos($properties[16], 'true') !== false);
                $userItem->isLocked = $properties[7] == 'true';

                $userItem->save();

            }
        }
    }
}