<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserItem extends Model
{

    protected $fillable = [

    ];

    public function character() {
        return $this->belongsTo(Character::class, 'characterId');
    }


}
