<?php namespace App\Http\Controllers\Admin;

use App\Enum\BagType;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function downloadLua(User $user) {
        $storage = storage_path('dumps/');
        if(File::exists($storage."dump_$user->id.lua")) {
            abort(404);
        }

        File::copy($storage . "dump_$user->id.lua", $storage.'TesoDelve.lua');
        return response()->download($storage."TesoDelve.lua");
    }

}
