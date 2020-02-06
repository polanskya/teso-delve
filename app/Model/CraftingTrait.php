<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Carbon researchDone_at
 * @property bool isKnown
 * @property string image
 * @property string name
 * @property int traitIndex
 * @property int researchLineIndex
 * @property int traitId
 * @property int craftingTypeEnum
 * @property int characterId
 */
class CraftingTrait extends Model
{
    protected $table = 'craftingTraits';

    protected $dates = [
        'researchDone_at',
    ];

    public $timestamps = false;

    public function character()
    {
        return $this->belongsTo(Character::class, 'characterId');
    }

    public function isResearched()
    {
        if (! is_null($this->researchDone_at)) {
            if ($this->researchDone_at < Carbon::now()) {
                $this->isKnown = 1;
                $this->save();
            }
        }

        return $this->isKnown;
    }

    public function isResearching()
    {
        if ($this->isResearched()) {
            return false;
        }

        return ! is_null($this->researchDone_at) and $this->researchDone_at > Carbon::now();
    }
}
