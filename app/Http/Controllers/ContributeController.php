<?php namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContributeController
{
    public function index() {
        return view('donate.index');
    }
}