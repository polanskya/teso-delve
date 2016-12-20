<?php namespace App\Http\Controllers;


use App\Model\Character;

class CharacterController
{

    public function show(Character $character) {
        return view('character.show', compact('character'));
    }


}