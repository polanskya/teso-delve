<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Character;
use App\Model\ItemSale;
use App\Model\Role\Permission;
use App\Model\Role\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    const SEEN_AT_DAYS = 1;


    public function index() {
        $seenAt = Carbon::now()->subDays(self::SEEN_AT_DAYS);

        $data = [
            'total_users' => User::count(),
            'new_users' => User::where('created_at', '>=', $seenAt)->count(),
            'users_activity' => User::where('seen_at', '>=', $seenAt)->count(),
            'dumps_activity' => User::where('dumpUploaded_at', '>=', $seenAt)->count(),

            'total_characters' => Character::count(),
            'new_characters' => Character::where('created_at', '>=', $seenAt)->count(),

            'total_sales' => ItemSale::count(),
            'sales_activity' => ItemSale::where('created_at', '>=', $seenAt)->count(),
        ];

        return view('admin.index', compact('data'));
    }

}
