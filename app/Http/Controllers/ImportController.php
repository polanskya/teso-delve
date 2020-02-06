<?php

namespace App\Http\Controllers;

use App\Jobs\EsoImport\AutoImport;
use App\Model\Dungeon;
use App\Model\DungeonSet;
use App\Model\ImportGroup;
use App\Model\Role\Permission;
use App\Model\Role\PermissionRole;
use App\Model\Role\Role;
use App\Model\Set;
use App\Model\SetBonus;
use App\Model\UserSetFavourite;
use App\Repository\GithubRepository;
use App\User;
use HeppyKarlsson\EsoImport\EsoImport;
use HeppyKarlsson\Meta\Model\Meta;
use HeppyKarlsson\MMImport\ImportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImportController
{
    public function import(EsoImport $esoImport)
    {
        $path = storage_path('TesoDelve.lua');
        $return = $esoImport->import($path);

//        $path = storage_path('TesoDelveGuild.lua');
//        $return = $esoImport->importGuild($path);

        return 'works';
    }

    public function auto(Request $request, EsoImport $esoImport)
    {
        $files = $request->files->all();
        $fileNames = [];

        $metainformation = Meta::where('value', $request->get('key'))
            ->where('key', 'user_upload_key')
            ->where('metable_type', 'App\User')
            ->first();

        if (is_null($metainformation)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Key was invalid');
        }

        $user = User::findOrFail($metainformation->metable_id);

        foreach ($files as $file) {
            /** @var $file UploadedFile */
            $fileName = $file->getClientOriginalName();
            $fileNames[] = $fileName;

            if ($fileName == 'TesoDelve.lua') {
                $new_file = storage_path('dumps/dump_'.Auth::id().'.lua');
                File::copy($file->getRealPath(), $new_file);

                $import = new AutoImport($new_file, $user->id);
                dispatch($import);

                return response('File uploaded successfully');
            }
        }

        Log::info('Auto upload files: '.implode(', ', $fileNames));
        abort(404, 'None of the uploaded file\'s were recognized: "'.implode(',', $fileNames).'"');
    }

    public function autoShow()
    {
        return view('import.import-auto.show');
    }

    public function mastermerchant()
    {
        $files = scandir(storage_path('app/mm-data'));

        $mmService = new ImportService();
        foreach ($files as $file) {
            if (stripos($file, '.lua') === false) {
                continue;
            }

            $mmService->import(storage_path('app/mm-data/'.$file));
        }
    }

    public function export()
    {
        $sets = Set::all();
        $setBonuses = SetBonus::all();
        $userFavourites = UserSetFavourite::all();
        $dungeons = Dungeon::all();
        $dungeonSets = DungeonSet::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionRole = PermissionRole::all();

        file_put_contents(storage_path('dump/sets.json'), $sets->toJson());
        file_put_contents(storage_path('dump/setBonuses.json'), $setBonuses->toJson());
        file_put_contents(storage_path('dump/userFavourites.json'), $userFavourites->toJson());
        file_put_contents(storage_path('dump/dungeons.json'), $dungeons->toJson());
        file_put_contents(storage_path('dump/dungeonSets.json'), $dungeonSets->toJson());
        file_put_contents(storage_path('dump/roles.json'), $roles->toJson());
        file_put_contents(storage_path('dump/permissions.json'), $permissions->toJson());
        file_put_contents(storage_path('dump/permissionRole.json'), $permissionRole->toJson());

        return 'success';
    }

    public function upload(Request $request, EsoImport $esoImport)
    {
        $files = $request->files->all();
        $fileNames = [];
        $user = Auth::user();

        foreach ($files as $file) {
            /** @var $file UploadedFile */
            $fileName = $file->getClientOriginalName();
            $fileNames[] = $fileName;

            if ($fileName == 'TesoDelve.lua') {
                File::copy($file->getRealPath(), storage_path('dumps/dump_'.Auth::id().'.lua'));

                return $esoImport->import($file->getRealPath(), $user);
            }

            if (substr($fileName, 0, 2) == 'MM' and stripos($fileName, 'Data.lua') !== false and $user->hasPermission('upload-mm')) {
                $newFile = storage_path('app/mm-data/'.Auth::id().'-'.$fileName);
                File::copy($file->getRealPath(), $newFile);

                $mmService = new ImportService();
                $mmService->import($newFile);

                return 'MM uploaded';
            }

            if ($fileName == 'TesoDelveGuild.lua') {
                File::copy($file->getRealPath(), storage_path('dumps/dumpGuild_'.Auth::id().'.lua'));
                $esoImport->importGuild($file->getRealPath());

                return 'Guilds imported';
            }
        }

        Log::info('User tried to upload: '.implode(', ', $fileNames));
        abort(404, 'None of the uploaded file\'s were recognized: "'.implode(',', $fileNames).'"');
    }

    public function index()
    {
        $githubRepository = new GithubRepository();
        $addonInfo = $githubRepository->info();

        $importGroup = ImportGroup::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();

        return view('import.index', compact('addonInfo', 'importGroup'));
    }
}
