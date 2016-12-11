<?php

namespace App\Model;

use App\Enum\EquipType;
use App\Enum\ItemType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int userId
 * @property int setId
 */
class UserSetFavourite extends Model
{
    protected $table = 'userSet_favourite';

    public $timestamps = false;
}
