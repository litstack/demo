<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\RouteController;

class RouteConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RouteController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/route';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Route',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->route('route')
                ->collection('app')
                ->title('Picke a Url');

            // ...
        });
    }
}
