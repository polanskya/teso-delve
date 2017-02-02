<?php

namespace App\Model;

use App\Enum\EquipType;
use App\Enum\ItemType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string uniqueId
 * @property string icon
 * @property string enchant
 * @property int locked
 * @property int armorType
 * @property int quality
 * @property int|null setId
 * @property int equipType
 * @property int trait
 * @property string name
 * @property int|null type
 * @property int userId
 * @property int|null weaponType
 * @property int|null championLevel
 * @property int|null level
 * @property int|null characterId
 * @property string itemLink
 * @property string traitDescription
 * @property string enchantDescription
 * @property int itemValue
 * @property int itemStyleId
 * @property mixed lang
 */
class Item extends Model
{

    protected $fillable = [
        'uniqueId',
        'name',
        'trait',
        'equipType',
        'setId',
        'count',
        'quality',
        'armorType',
        'locked',
        'enchant',
        'icon',
        'type',
    ];

    public function setNameAttribute($value) {
        $value = str_ireplace('^n', '', $value);
        $value = str_ireplace('^p', '', $value);
        $this->attributes['name'] = $value;
    }

    public function set() {
        return $this->belongsTo(Set::class, 'setId');
    }

    public function character() {
        return $this->belongsTo(Character::class, 'characterId');
    }

    public function setItemSet($setName) {
            $setName = trim($setName);
            $set = Set::where('name', $setName)->where('lang', $this->lang)->first();

            if (!$set) {
                $set = new Set();
                $set->name = $setName;
                $set->lang = $this->lang;
                $set->save();
            }

            $this->setId = $set->id;
    }

    public function traitCategory() {

        if($this->type == ItemType::WEAPON and $this->equipType == EquipType::OFF_HAND) {
            return 2;
        }

        if($this->type == ItemType::WEAPON) {
            return 1;
        }

        if($this->type == ItemType::ARMOR and in_array($this->equipType, [EquipType::RING, EquipType::NECK])) {
            return 3;
        }

        if($this->type == ItemType::ARMOR) {
            return 2;
        }

        return false;
    }

}
