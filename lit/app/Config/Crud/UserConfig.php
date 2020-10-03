<?php

namespace Lit\Config\Crud;

use App\Models\User;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\UserController;

class UserConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = User::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = UserController::class;

    /**
     * Model singular and plural name.
     *
     * @param User|null user
     * @return array
     */
    public function names(User $user = null)
    {
        return [
            'singular' => 'User',
            'plural'   => 'Users',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'users';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->col('title')->value('{title}')->sortBy('title');
        })
            ->search('title')
            ->sortBy([
                'id.desc' => __lit('lit.sort_new_to_old'),
                'id.asc'  => __lit('lit.sort_old_to_new'),
            ]);
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('title')->title('Title')->width(6);
        });
    }
}
