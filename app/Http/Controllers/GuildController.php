<?php namespace App\Http\Controllers;

use App\Model\Guild;

class GuildController extends Controller
{

    public function show(Guild $guild) {
        $guild->load('members.user.characters');
        return view('guild.show', compact('guild'));
    }

}
