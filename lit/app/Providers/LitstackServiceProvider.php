<?php

namespace Lit\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Lit\Composers\LoginComposer;

class LitstackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(lit_resource_path('views'), 'lit');

        View::composer('litstack::auth.login', LoginComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
