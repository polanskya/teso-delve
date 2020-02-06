<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class InventoryFilterComposer
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $request = request();
        $route = route($request->route()->getName(), $request->route()->parameters());
        $query = $this->request->query();

        $user = Auth::user();
        $accounts = $user->characters->pluck('account')->unique();

        $view->with('accounts', $accounts);
        $view->with('characters', $user->characters);
        $view->with('filterRoute', $route);
        $view->with('filterQuery', $query);
    }
}
