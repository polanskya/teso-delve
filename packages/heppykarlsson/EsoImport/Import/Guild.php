<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Guild as GuildModel;
use App\Model\GuildMember;
use Carbon\Carbon;

class Guild
{
    const EXPLODE_COUNT = 10;


    static public function check($line)
    {
        if(strpos($line, 'GUILD:') === false) {
            return false;
        }

        $data = explode(";--;", $line);

        return count($data) == self::EXPLODE_COUNT;
    }

    public function process($line, $user) {
        $guildInfo = explode(';--;', $line);

        if(count($guildInfo) != self::EXPLODE_COUNT) {
            return false;
        }

        $name = trim($guildInfo[1]);
        $world = trim($guildInfo[6]);

        $guild = GuildModel::where('name', $name)
            ->where('world', $world)
            ->first();

        if(is_null($guild)) {
            $guild = new GuildModel();

            $guild->name = $name;
            $guild->world = $world;
            $guild->founded_at = Carbon::parse($guildInfo[4]);
            $guild->save();
        }

        $member = $guild->members()->where('user_id', $user->id)->first();

        if(is_null($member)) {
            $gm = new GuildMember();
            $gm->guild_id = $guild->id;
            $gm->user_id = $user->id;
            $gm->accountName = $user->characters()->first()->account;
            $gm->rank = 4;
            $gm->lastSeen_at = Carbon::now();
            $gm->note = '';
            $gm->save();
        }

    }
}
