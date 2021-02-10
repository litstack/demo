<?php

namespace Lit\Providers;

use Ignite\Crud\Fields\Route;
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

        Route::register('app', function ($collection) {
            $collection->route('Home', 'home', function () {
                return '/home';
            });

            $collection->route('Datapolicy', 'datapolicy', function () {
                return '/datapolicy';
            });

            $collection->route('Imprint', 'imprint', function () {
                return '/imprint';
            });

            $collection->group('Articles', 'articles', function ($group) {
                $articles = [
                    [
                        'title' => 'Foo',
                        'id'    => 1,
                    ],
                    [
                        'title' => 'Bar',
                        'id'    => 2,
                    ],
                ];

                foreach ($articles as $article) {
                    $group->route($article['title'], $article['id'], function () use ($article) {
                        return "/articles/{$article['id']}";
                    });
                }
            });
        });
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
