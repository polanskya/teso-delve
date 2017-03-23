<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role\Permission;
use App\Model\Role\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {
        return view('admin.index');
    }

}
