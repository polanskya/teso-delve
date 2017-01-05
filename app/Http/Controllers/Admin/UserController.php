<?php namespace App\Http\Controllers\Admin;

use App\Enum\BagType;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {
        $users = User::with('characters')->get();
        return view('admin.users.index', compact('users'));
    }

    public function ghost(User $user) {
        Auth::login($user);
        return redirect(route('home.index'));
    }

}
