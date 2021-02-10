<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\CheckboxesController;

class CheckboxesConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CheckboxesController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/checkboxes';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Checkboxes',
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
            $form->checkboxes('text')->options([
                'orange'    => 'Orange',
                'apple'     => 'Apple',
                'pineapple' => 'Pineapple',
            ]);
        });
    }
}
