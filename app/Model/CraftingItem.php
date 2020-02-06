<?php

namespace App\Model;

use App\Objects\Zones;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CraftingItem extends Model
{
    public function getSortAttribute()
    {
        return $this->level + $this->championLevel;
    }
}
