<?php

namespace App\Enum;

class PledgeChest
{
    use ListConstants;

    const MAJ_AL_RAGATH = 1;
    const GLIRION_THE_REDBEARD = 2;
    const URGALARG_CHIEF_BANE = 3;

    public static function all()
    {
        return [self::MAJ_AL_RAGATH, self::GLIRION_THE_REDBEARD, self::URGALARG_CHIEF_BANE];
    }
}
