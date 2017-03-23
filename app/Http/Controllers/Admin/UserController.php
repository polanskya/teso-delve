<?php namespace App\Http\Controllers\Admin;

use App\Enum\BagType;
use App\Http\Controllers\Controller;
use App\Model\Role\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index() {
        $users = User::with(['characters', 'roles'])->get();

        $user = Auth::user();

        return view('admin.users.index', compact('users'));
    }

    public function ghost(User $user) {
        Auth::login($user);
        return redirect(route('home.index'));
    }

    public function downloadLua(User $user) {
        $storage = storage_path('dumps/');
        $file = $storage."dump_$user->id.lua";

        if(!File::exists($file)) {
            abort(403);
        }

        return response()->download($file);
    }

}
