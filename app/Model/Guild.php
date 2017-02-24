<?php

namespace App\Model;

use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use Sluggify;

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'founded_at',
    ];

    public function members() {
        return $this->hasMany(GuildMember::class);
    }

}

