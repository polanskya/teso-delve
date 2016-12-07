<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property bool craftable
 * @property int|null traitNeeded
 * @property string|null description
 */
class Set extends Model
{

    protected $fillable = [

    ];

    public function bonuses() {
       return $this->hasMany(SetBonus::class, 'setId');
    }

}
