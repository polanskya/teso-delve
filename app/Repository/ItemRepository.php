<?php namespace App\Repository;

use App\Enum\BagType;
use App\Enum\Import\ItemPosition;
use App\Model\ItemStyle;
use App\Model\UserItem;
use Carbon\Carbon;

class ItemRepository
{
    private $save = true;

    public function __construct($save = true)
    {
        $this->save = $save;
    }

    public function importGet($data, $items) {

        $item = $items->where('external_id', $data[ItemPosition::NAME])
            ->where('trait', intval($data[2]))
            ->where('quality', intval($data[5]))
            ->where('equipType', intval($data[3]))
            ->where('armorType', intval($data[6]))
            ->where('type', intval($data[10]))
            ->where('weaponType', intval($data[13]))
            ->where('enchant', trim($data[8]))
            ->where('icon', trim($data[9]))
            ->where('itemValue', intval($data[22]))
            ->where('level', intval($data[12]))
            ->where('championLevel', intval($data[11]))
            ->first();

        return $item;

    }

    public function userItem($data, $user_id, $itemStyles, $characters) {
        $bagType = $data[ItemPosition::BAGTYPE];

        $character = $characters
            ->where('externalId', intval($data[ItemPosition::CHARACTER_EXTERNAL_ID]))
            ->first();

        if($bagType == BagType::BANK) {
            $character = null;
        }

        if($bagType == BagType::VIRTUAL) {
            $character = null;
        }

        $userItem = new UserItem();
        $userItem->userId = $user_id;
        $userItem->itemId = $data['item_id'];
        $userItem->characterId = is_null($character) ? null : $character->id;
        $userItem->uniqueId = $data[0];
        $userItem->traitEnum = $data[2];
        $userItem->traitDescription = $data[21];
        $userItem->isJunk = $data[18] == 'true';
        $userItem->enchant = $data[8];
        $userItem->enchantDescription = $data[20];
        $userItem->bagEnum = $bagType;
        $userItem->slotId = intval($data[23]);

        $userItem->itemStyleId = null;
        if(isset($data[25]) and intval($data[25]) != 0) {
            $itemStyle = $itemStyles->where('externalId', intval($data[25]))->first();
            $userItem->itemStyleId = isset($itemStyle->id) ? $itemStyle->id : null;
        }

        $userItem->equipTypeEnum = $data[3];
        $userItem->armorTypeEnum = $data[6];
        $userItem->weaponTypeEnum = intval($data[13]);
        $userItem->itemTypeEnum = intval($data[10]);
        $userItem->count = intval($data[17]);

        $userItem->isBound = (isset($data[16]) and stripos($data[16], 'true') !== false);
        $userItem->isLocked = $data[7] == 'true';

        if($this->save) {
            $userItem->save();
            return $userItem;
        }

        $userItem->created_at = Carbon::now();
        $userItem->updated_at = $userItem->created_at;

        return $userItem;
    }

    public function create($data, $itemStyles) {
        $name = $data[ItemPosition::NAME];
        $lang = explode('"', $data[ItemPosition::LANG])[0];

        $item = new \App\Model\Item();
        $item->uniqueId = $data[0];
        $item->name = $name;
        $item->external_id = $name;
        $item->equipType = intval($data[3]);
        $item->armorType = intval($data[6]);
        $item->quality = intval($data[5]);
        $item->icon = trim($data[9]);
        $item->type = intval($data[10]);
        $item->championLevel = intval($data[11]);
        $item->level = intval($data[12]);
        $item->weaponType = intval($data[13]);
        $item->itemLink = $data[19];
        $item->trait = $data[2];
        $item->traitDescription = $data[21];
        $item->enchant = trim($data[8]);
        $item->enchantDescription = $data[20];
        $item->itemValue = intval($data[22]);
        $item->lang = $lang;
        $item->setId = null;
        $item->itemStyleId = null;
        $item->flavor = null;

        if(isset($data[29])) {
            $item->flavor = $data[29];
        }

        if(!empty($data[4])) {
            $item->setItemSet($data[4]);
        }

        if(isset($data[25]) and intval($data[25]) != 0) {
            $itemStyle = $itemStyles->where('externalId', intval($data[25]))->first();

            if(is_null($itemStyle)) {
                $itemStyle = new ItemStyle();
                $itemStyle->externalId = intval($data[25]);
                $itemStyle->name = '';
                $itemStyle->image = '';
                $itemStyle->save();
                $itemStyles->add($itemStyle);

            }
            $item->itemStyleId = isset($itemStyle->id) ? $itemStyle->id : null;
        }

        if($this->save) {
            $item->save();
            return $item;
        }

        $item->created_at = Carbon::now();
        $item->updated_at = $item->created_at;

        return $item;
    }
}