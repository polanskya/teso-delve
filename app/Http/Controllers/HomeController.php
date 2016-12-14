<?php

namespace App\Http\Controllers;

use App\Model\Item;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Auth::user()->items()
            ->with('set')
            ->orderBy('setId', 'DESC')
            ->orderBy('name')
            ->get();

        return view('item.index', compact('items'));
    }
}
