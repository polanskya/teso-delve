<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed itemId
 * @property int userId
 * @property int characterId
 * @property int uniqueId
 * @property int traitEnum
 * @property string traitDescription
 * @property bool isJunk
 * @property string enchant
 * @property string enchantDescription
 * @property int|null bagEnum
 * @property int slotId
 * @property int itemStyleId
 * @property int equipTypeEnum
 * @property int armorTypeEnum
 * @property int weaponTypeEnum
 * @property int count
 * @property bool isBound
 * @property bool isLocked
 * @property int itemTypeEnum
 */
class UserItem extends Model
{
    protected $fillable = [

    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'characterId');
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'itemId');
    }
}
