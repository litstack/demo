<?php

namespace Lit\Config\Form\Form;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Form\AdvancedController;
use Lit\Repeatables\ImageRepeatable;
use Lit\Repeatables\TextRepeatable;

class AdvancedConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = AdvancedController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'form/advanced';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Advanced',
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
            $form->input('credit_card')->mask(['creditCard' => true])->translatable(false)->width(1 / 2)->append(fa('credit-card'));
            $form->input('phone_number')->mask(['phone' => true, 'phoneRegionCode' => 'us'])->width(1 / 2)->append(fa('phone'));
        })->title('Input Masks');

        $page->card(function ($form) {
            $form->route('route')
                ->collection('app')
                ->title('Picke a Route');
        })->title('Route Picker');

        $page->card(function ($form) {
            $form->list('menue')
                ->title('Menue')
                ->previewTitle('{title}')
                ->form(function ($form) {
                    $form->input('title')->rules('required')->translatable(false);
                    $form->textarea('Text')->translatable(false);
                });
            $form->info()->text(fa('info-circle').' The sortable list field can be used to create a navigation builder.');
        })->title('Sortable List');

        $page->card(function ($form) {
            $form->info()
                ->text('Add repetitive content to your side using a block field and repeatables.')
                ->text('Each repeatable has form fields and a preivew that shows its content when collapsed.');
            $form->block('content')
                ->repeatables(function ($rep) {
                    $rep->add(TextRepeatable::class);
                    $rep->add(ImageRepeatable::class);
                });
        })->title('Block');
    }
}
