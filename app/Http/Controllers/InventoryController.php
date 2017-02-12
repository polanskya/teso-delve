<?php namespace App\Http\Controllers;

use App\Enum\BagType;
use App\Enum\ItemType;
use App\Model\UserItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{

    public function index(Request $request) {
        $user = Auth::user();

        $filter = $request->get('filter');
        $name = $request->get('name');
        $bagEnum = [BagType::BACKPACK, BagType::WORN, BagType::BANK, BagType::VIRTUAL];

        $characters = null;
        if(intval($request->get('character')) != 0) {
            $characters = $user->characters()->where('id', $request->get('character'))->get();
        }

        if(!empty($request->get('account'))) {
            $characters = $user->characters()->where('account', $request->get('account'))->get();
        }

        if($filter == 'bank') {
            $bagEnum = [BagType::BANK];
        }

        if($filter == 'craftingBag') {
            $bagEnum = [BagType::VIRTUAL];
        }

        $userItems = UserItem::with('item')->where('userId', $user->id)
            ->whereIn('bagEnum', $bagEnum)
            ->when($filter == 'weapon', function($query) {
                return $query->where('itemTypeEnum', ItemType::WEAPON);
            })
            ->when($filter == 'armor', function($query) {
                return $query->where('itemTypeEnum', ItemType::ARMOR);
            })
            ->when($filter == 'consumable', function($query) {
                return $query->whereIn('itemTypeEnum', ItemType::consumables());
            })
            ->when($filter == 'material', function($query) {
                return $query->whereIn('itemTypeEnum', ItemType::materials());
            })
            ->when($filter == 'misc', function($query) {
                return $query->whereIn('itemTypeEnum', ItemType::misc());
            })
            ->when($filter == 'junk', function($query) {
                return $query->where('isJunk', true);
            })
            ->when(!is_null($characters), function($query) use ($characters) {
                return $query->whereIn('characterId', $characters->pluck('id'));
            })
            ->get()->sortBy('item.name');

        if(!empty($name)) {
            $userItems = $userItems->filter(function ($value, $key) use ($name) {
                return stripos($value->item->name, $name) !== false;
            });
        }


        $bagSize = 0;
        $gold = 0;

        return view('inventory.list', compact('gold', 'bagSize', 'user', 'userItems'));
    }

}
