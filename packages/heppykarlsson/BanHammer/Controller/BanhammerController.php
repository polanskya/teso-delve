<?php namespace HeppyKarlsson\BanHammer\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BanhammerController extends Controller
{

    public function index(Request $request) {
        $bans = config('banhammer.perm-bans');
        $banIp = $request->get('ip');

        if(!is_array($bans)) {
            $bans = [];
        }

        return view('BanHammer::index', compact('bans', 'banIp'));
    }

    public function delete($id) {
        $banhammerConf = config('banhammer');

        unset($banhammerConf['perm-bans'][$id]);
        $this->write($banhammerConf);
        return redirect()->route('admin.ban.index');
    }

    public function store(Request $request) {
        $banhammerConf = config('banhammer');

        if($request->get('ip') == $request->ip()) {
            return redirect()->route('admin.ban.index');
        }

        $banhammerConf['perm-bans'][] = $request->get('ip');
        $this->write($banhammerConf);

        return redirect()->route('admin.ban.index');
    }

    private function write($bans) {
        File::put(config_path('banhammer.php'), "<?php \n\nreturn " . var_export($bans, true) . ";");
        sleep(2);
    }

}