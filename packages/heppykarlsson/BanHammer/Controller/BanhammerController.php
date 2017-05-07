<?php namespace HeppyKarlsson\BanHammer\Controller;

use App\Http\Controllers\Controller;
use HeppyKarlsson\BanHammer\BanHammer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BanhammerController extends Controller
{

    public function index(Request $request) {
        $bans = BanHammer::bans();
        $banIp = $request->get('ip');

        return view('BanHammer::index', compact('bans', 'banIp'));
    }

    public function delete($ip) {
        BanHammer::unban($ip);
        return redirect()->route('admin.ban.index');
    }

    public function store(Request $request) {
        if($request->get('ip') == $request->ip()) {
            return redirect()->route('admin.ban.index');
        }

        $result = BanHammer::ban($request->get('ip'));
        return redirect()->route('admin.ban.index')->with('banned', $result);
    }

}