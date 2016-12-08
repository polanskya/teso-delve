<?php
/**
 * Created by PhpStorm.
 * User: Heppy
 * Date: 2016-12-04
 * Time: 13:15
 */

namespace App\Http\Controllers;


use App\Model\Dungeon;
use App\Model\DungeonSet;
use App\Model\Set;
use App\Model\SetBonus;
use App\Model\UserSetFavourite;
use HeppyKarlsson\EsoImport\EsoImport;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImportController
{

    public function import(EsoImport $esoImport) {
        $esoImport->import(storage_path('AddonDB.lua'));
    }

    public function export() {
        $sets = Set::all();
        $setBonuses = SetBonus::all();
        $userFavourites = UserSetFavourite::all();
        $dungeons = Dungeon::all();
        $dungeonSets = DungeonSet::all();


        file_put_contents(storage_path('dump/sets.json'), $sets->toJson());
        file_put_contents(storage_path('dump/setBonuses.json'), $setBonuses->toJson());
        file_put_contents(storage_path('dump/userFavourites.json'), $userFavourites->toJson());
        file_put_contents(storage_path('dump/dungeons.json'), $dungeons->toJson());
        file_put_contents(storage_path('dump/dungeonSets.json'), $dungeonSets->toJson());

        return 'success';
    }

    public function upload(Request $request, EsoImport $esoImport) {
        $files = $request->files->all();

        foreach($files as $file) {
            /** @var $file UploadedFile */
            if($file->getClientOriginalName() == 'AddonDB.lua') {
                $esoImport->import($file->getRealPath());
            }
            else {
                abort(404);
            }
        }
    }

    public function index() {
        return view('import.index');
    }

}