<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Model\Guild as GuildModel;
use Carbon\Carbon;

class Guild
{

    static public function check($line)
    {
        if(strpos($line, 'GUILD:;--;') === false) {
            return false;
        }

        $data = explode(";--;", $line);
        return count($data) == 9;
    }

    public function process($line, $user) {
        $guildInfo = explode(';', $line);

        if(count($guildInfo) < 8) {
            return false;
        }

        $name = trim($guildInfo[1]);
        $world = trim($guildInfo[6]);

        $guild = GuildModel::where('name', $name)->where('world', $world)->first();

        if(is_null($guild)) {
            $guild = new GuildModel();
        }

        $guild->name = $name;
        $guild->world = $world;
        $guild->description = $guildInfo[2];
        $guild->founded_at = Carbon::parse($guildInfo[4]);
        $guild->save();
    }
}
