<?php namespace App\Http\Controllers\Admin;

use App\Enum\BagType;
use App\Enum\ItemStyleChapter;
use App\Http\Controllers\Controller;
use App\Model\Boss;
use App\Model\Dungeon;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\ItemStyleChapter as ItemStyleChapterModel;
use App\Objects\Zones;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BossController extends Controller
{

    public function create(Request $request) {
        $dungeon_id = null;
        $zone_id = null;

        if($request->has('dungeon_id')) {
            $dungeon_id = $request->get('dungeon_id');
        }

        $dungeons = Dungeon::all();
        $zones = new Zones();
        $zones = $zones->getZones();
        $boss = new Boss();

        return view('admin.boss.create', compact('boss', 'zone_id', 'dungeon_id', 'dungeons', 'zones'));
    }

    public function edit(Boss $boss) {
        $dungeon_id = $boss->dungeon_id;
        $zone_id = $boss->zone_id;

        $dungeons = Dungeon::all();
        $zones = new Zones();
        $zones = $zones->getZones();

        return view('admin.boss.create', compact('boss', 'zone_id', 'dungeon_id', 'dungeons', 'zones'));
    }

    public function delete(Boss $boss) {
        $boss->delete();
        return redirect()->back();
    }

    public function update(Boss $boss, Request $request) {
        $data = $request->get('boss');

        $boss->name = $data['name'];
        $boss->dungeon_id = empty($data['dungeon_id']) ? null : $data['dungeon_id'];
        $boss->zone_id = empty($data['zone_id']) ? null : $data['zone_id'];
        $boss->order = intval($data['order']) == 0 ? null : intval($data['order']);
        $boss->description = $data['description'];
        $boss->mechanics = $data['mechanics'];
        $boss->strategy = $data['strategy'];
        $boss->save();

        return redirect()->back();
    }
    public function store(Request $request) {
        $data = $request->get('boss');

        $boss = new Boss();
        $boss->name = $data['name'];
        $boss->dungeon_id = empty($data['dungeon_id']) ? null : $data['dungeon_id'];
        $boss->zone_id = empty($data['zone_id']) ? null : $data['zone_id'];
        $boss->order = intval($data['order']) == 0 ? null : intval($data['order']);
        $boss->description = $data['description'];
        $boss->mechanics = $data['mechanics'];
        $boss->strategy = $data['strategy'];
        $boss->save();

        return redirect()->back();
    }

}
