<?php namespace HeppyKarlsson\EsoImport;


use App\Model\Item;
use App\Model\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EsoImport
{

    public function import($file_path) {
        DB::table('items')->truncate();
        echo "Importing<br>";
        $file = fopen($file_path, 'r');

        if($file) {
            $line = null;
            while (!feof($file))
            {
                $line = fgets($file);
                $this->importItem($line);
            }
            fclose($file);
        }
        else {
            throw new \Exception('File couldnt be opened');
        }

    }

    public function importItem($line) {
        $item_start = stripos($line, 'ITEM:');
        if($item_start === false) {
            return false;
        }

        $line = str_ireplace('",', '', $line);
        $line = substr($line, $item_start + 5);

        $properties = explode(';', $line);

        $item_exists = Item::where('uniqueId', $properties[0])->first();

        if($item_exists) {
            //return true;
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