<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DailyPledges extends Model
{
    public $timestamps = false;

    protected $table = 'dailyPledges';

    protected $dates = [
        'date',
    ];

    protected $fillable = [

    ];

    public function firstPledge()
    {
        return $this->hasOne(Dungeon::class, 'id', 'pledge1');
    }

    public function secondPledge()
    {
        return $this->hasOne(Dungeon::class, 'id', 'pledge2');
    }

    public function thirdPledge()
    {
        return $this->hasOne(Dungeon::class, 'id', 'pledge3');
    }
}
