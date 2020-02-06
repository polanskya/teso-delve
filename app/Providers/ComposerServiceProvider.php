<?php

namespace App\Providers;

use App\Http\ViewComposers\InventoryFilterComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('inventory.partials.filter', InventoryFilterComposer::class);
        View::composer('guild.partials.filter', InventoryFilterComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
