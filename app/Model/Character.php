<?php

namespace App\Model;

use App\Enum\CraftingType;
use Carbon\Carbon;
use HeppyKarlsson\Meta\Traits\Meta;
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
 * @property null deleted_at
 * @property mixed id
 * @property bool isTank
 * @property bool isHealer
 * @property bool isDPS
 * @property string server
 * @property string account
 * @property int currency
 * @property mixed|string lang
 */
class Character extends Model
{

    use SoftDeletes,
        Meta;

    public function items() {
        return $this->belongsToMany(Item::class, 'user_items', 'characterId', 'itemId')
            ->withPivot('characterId', 'uniqueId', 'bagEnum', 'slotId', 'traitEnum', 'traitDescription', 'enchant', 'enchantDescription', 'equipTypeEnum', 'armorTypeEnum', 'weaponTypeEnum', 'isLocked', 'isBound', 'isJunk', 'count');
    }

    public function userItems() {
        return $this->hasMany(UserItem::class, 'characterId');
    }

    protected $fillable = [

    ];

    public function craftingTraits() {
        return $this->hasMany(CraftingTrait::class, 'characterId');
    }

    public function canResearch($craftingType) {
        $value = 1;
        $maxResearch = $this->meta->where('key', 'max_smithing_' . $craftingType)->first();
        if($maxResearch) {
            $value = $maxResearch->value;
        }

        return $this->craftingTraits->where('researchDone_at', '>', Carbon::now())->where('craftingTypeEnum', $craftingType)->count() < $value;
    }

    public function nextResearch($craftingType) {
        return $this->craftingTraits->where('researchDone_at', '>', Carbon::now())->where('craftingTypeEnum', $craftingType)->min('researchDone_at');
    }

    public function itemStyles() {
        return $this->hasMany(CharacterItemStyle::class, 'characterId', 'id');
    }

    public function roles() {
        $roles = [];

        if($this->isTank) {
            $roles[] = 'Tank';
        }

        if($this->isHealer) {
            $roles[] = 'Healer';
        }
        if($this->isDPS) {
            $roles[] = 'Damage dealer';
        }

        return $roles;
    }

}
