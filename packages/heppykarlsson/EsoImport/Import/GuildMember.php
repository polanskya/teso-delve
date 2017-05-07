<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Character;
use App\Model\Guild as GuildModel;
use App\Model\Guild;
use Carbon\Carbon;

class GuildMember
{
    const EXPLODE_COUNT = 11;

    static public function check($line)
    {
        if(strpos($line, 'GUILDMEMBER:;--;') === false) {
            return false;
        }

        $data = explode(';--;', $line);

        return count($data) == self::EXPLODE_COUNT;
    }

    public function process($line, $user, &$guilds) {
        set_time_limit(5);
        $memberInfo = explode(';--;', $line);

        $name = trim($memberInfo[1]);
        $world = trim($memberInfo[8]);

        $guild = $guilds->where('world', $world)
            ->where('name', $name)
            ->first();


        if(is_null($guild)) {
            return false;
        }

        $character = Character::where('account', $memberInfo[2])->first();

        $guildMember = $guild->members
            ->where('accountName', $memberInfo[2])
            ->first();

        $ranks = $guild->ranks->count();

        $guildMember = is_null($guildMember) ? new \App\Model\GuildMember() : $guildMember;
        $guildMember->accountName = $memberInfo[2];
        $guildMember->guild_id = $guild->id;
        $guildMember->note = $memberInfo[4];
        $guildMember->account_id = null;
        $guildMember->rank = 1 + ($ranks - $memberInfo[5]);
        $guildMember->user_id = isset($character) ? $character->userId : null;
        $guildMember->lastSeen_at = intval($memberInfo[6]) !== 0 ? Carbon::createFromTimestamp(intval($memberInfo[7]) - intval($memberInfo[6])) : Carbon::createFromTimestamp(intval($memberInfo[7]));
        $guildMember->save();
    }
}
