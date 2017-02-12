<?php

namespace App\Model;

use App\Enum\CraftingType;
use Carbon\Carbon;
use HeppyKarlsson\Meta\Traits\Meta;
use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guild extends Model
{
    use Sluggify;

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    public function members() {
        return $this->hasMany(GuildMember::class);
    }

}

