<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Character;
use App\Model\Guild as GuildModel;
use Carbon\Carbon;

class GuildMember
{

    static public function check($line)
    {
        return strpos($line, 'GUILDMEMBER:;') !== false;
    }

    public function process($line, $user) {
        $memberInfo = explode(';', $line);

        if(count($memberInfo) != 11) {
            return false;
        }

        $name = trim($memberInfo[1]);
        $world = trim($memberInfo[9]);

        $guild = GuildModel::where('name', $name)->where('world', $world)->first();
        if(is_null($guild)) {
            return false;
        }

        $guildMember = \App\Model\GuildMember::where('guild_id', $guild->id)->where('accountName', $memberInfo[3])->first();
        $character = Character::where('account', $memberInfo[3])->first();

        if(is_null($guildMember)) {
            $guildMember = new \App\Model\GuildMember();
        }

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
