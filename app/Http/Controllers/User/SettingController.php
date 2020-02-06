<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function edit()
    {

        /** @var User $user */
        $user = Auth::user();

        $settings = [
            'import-key' => $user->getMeta('user_upload_key'),
        ];

        return view('user.settings.edit', compact('user', 'settings'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($request->has('generate-import-key')) {
            $importKey = sha1($user->email.'-'.$user->name.'-'.Carbon::now());
            $user->setMeta('user_upload_key', $importKey);
        }

        return redirect()->route('user.settings.edit');
    }
}
