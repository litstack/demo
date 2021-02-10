<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\ModalController;

class ModalConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ModalController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/modal';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Modal',
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
            $form->modal('update_mail')
                ->title('E-Mail')
                ->name('Update E-Mail')
                ->form(function ($form) {
                    $form->input('mail')->title('E-Mail');
                });

            // ...
        });
    }
}
