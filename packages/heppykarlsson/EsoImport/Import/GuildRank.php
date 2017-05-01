<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Character;
use App\Model\Guild as GuildModel;
use App\Model\Guild;
use Carbon\Carbon;

class GuildRank
{
    const EXPLODE_COUNT = 12;

    static public function check($line)
    {
        if(strpos($line, 'GUILDRANK:;--;') === false) {
            return false;
        }

        return true;
    }

    public function process($line, $guilds) {

        $data = explode(';--;', $line);

        $guild = $guilds->where('name', $data[1])
            ->where('world', $data[2])
            ->first();

        if(is_null($guild)) {
            return false;
        }

        $rank = $guild->ranks
            ->where('rank_index', $data[3])
            ->first();

        $rank = is_null($rank) ? new \App\Model\GuildRank() : $rank;
        $rank->name = empty($data[5]) ? $data[6] : $data[5];
        $rank->guild_id = $guild->id;
        $rank->rank_index = $data[3];
        $rank->external_id = $data[4];
        $rank->isGuildmaster = $data[7] == 'true';
        $rank->icon_small = $data[8];
        $rank->icon_large = $data[9];
        $rank->icon_active = $data[10];
        $rank->save();

        return true;
    }
}
