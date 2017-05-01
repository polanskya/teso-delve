<?php

namespace App\Model;

use App\Enum\CraftingType;
use App\User;
use Carbon\Carbon;
use HeppyKarlsson\Meta\Traits\Meta;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuildMember extends Model
{

    protected $dates = [
        'lastSeen_at'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function presentNote() {
        return str_ireplace(['\n', '\r'], ['<br>', ''], $this->note);
    }

}
