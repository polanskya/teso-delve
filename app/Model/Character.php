<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string name
 * @property int userId
 * @property int allianceId
 * @property int raceId
 * @property int championLevel
 * @property int level
 * @property int classId
 * @property int ridingUnlocked_at
 * @property int externalId
 */
class Character extends Model
{

    use SoftDeletes;

    protected $fillable = [

    ];


}
