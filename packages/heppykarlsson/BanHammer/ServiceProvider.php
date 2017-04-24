<?php namespace HeppyKarlsson\BanHammer;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider AS Default_ServiceProvider;

class ServiceProvider extends Default_ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/banhammer.php' => config_path('banhammer.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/Views', 'BanHammer');
    }

    public function register() {


    }
}