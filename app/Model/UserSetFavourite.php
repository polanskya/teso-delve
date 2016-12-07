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
 */
class UserSetFavourite extends Model
{
    protected $table = 'userSet_favourite';

    public $timestamps = false;
}
