<?php namespace App\Http\Controllers;

use App\Enum\BagType;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $items = Auth::user()->items->where('pivot.bagEnum', BagType::BANK);
        $gold = 0;

        return view('inventory.index', compact('bagEnum', 'items', 'gold'));
    }

}
