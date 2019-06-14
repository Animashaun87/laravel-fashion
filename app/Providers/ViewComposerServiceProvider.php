<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerHeader();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function composerHeader() {
        view()->composer('partials.header', '\App\Http\Composers\NavigationComposer@categories');
    }
    
}
