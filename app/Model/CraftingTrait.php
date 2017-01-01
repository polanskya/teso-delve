<?php

namespace App\Model;

use App\Enum\EquipType;
use App\Enum\ItemType;
use Illuminate\Database\Eloquent\Model;

class CraftingTrait extends Model
{

    protected $table = 'craftingTraits';

    protected $dates = [
        'researchDone_at',
    ];

    public $timestamps = false;

}
