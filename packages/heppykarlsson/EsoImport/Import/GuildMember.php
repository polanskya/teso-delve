<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Character;
use App\Model\Guild as GuildModel;
use App\Model\Guild;
use Carbon\Carbon;

class GuildMember
{
    const EXPLODE_COUNT = 12;

    static public function check($line)
    {
        if(strpos($line, 'GUILDMEMBER:;--;') === false) {
            return false;
        }

        $data = explode(';--;', $line);

        return count($data) == self::EXPLODE_COUNT;
    }

    public function process($line, $user, &$guilds) {
        $memberInfo = explode(';--;', $line);

        if(count($memberInfo) < self::EXPLODE_COUNT) {
            return false;
        }

        $name = trim($memberInfo[1]);
        $world = trim($memberInfo[9]);

        if(isset($guilds[$world][$name])) {
            $guild = $guilds[$world][$name];
        }
        else {
            $guild = Guild::where('name', $name)
                ->where('world', $world)
                ->first();

            $guilds[$guild->world][$guild->name] = $guild;
        }

        if(is_null($guild)) {
            return false;
        }

        $character = Character::where('account', $memberInfo[3])->first();

        $guildMember = $guild->members
            ->where('accountName', $memberInfo[3])
            ->first();

        $guildMember = is_null($guildMember) ? new \App\Model\GuildMember() : $guildMember;
        $guildMember->accountName = $memberInfo[3];
        $guildMember->guild_id = $guild->id;
        $guildMember->note = $memberInfo[4];
        $guildMember->account_id = null;
        $guildMember->rank = $memberInfo[5];
        $guildMember->user_id = isset($character) ? $character->userId : null;
        $guildMember->lastSeen_at = intval($memberInfo[7]) !== 0 ? Carbon::createFromTimestamp(intval($memberInfo[8]) - intval($memberInfo[7])) : Carbon::createFromTimestamp(intval($memberInfo[8]));
        $guildMember->save();
    }
}
