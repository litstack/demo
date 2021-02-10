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
            $form->markdown('
Use the modal field to move fields to forms that need to be edited less frequently.

```php
$form->modal(\'billing_address\')
    ->title(\'Billing Address\')
    ->name(\'Edit Address\')
    ->preview(\'
        <div>{billing_address_first_name} {billing_address_last_name}</div>
        <div>{billing_address_company}</div>
        <div>{billing_address_street}</div>
        <div>{billing_address_zip} {billing_address_city}</div>
        <div>{billing_address_country}</div>
        \')
    ->form(function ($form) {
        $form->input(\'billing_address_first_name\')->title(\'First Name\')->width(6)->translatable(false);
        $form->input(\'billing_address_last_name\')->title(\'First Name\')->width(6)->translatable(false);
        $form->input(\'billing_address_company\')->title(\'Company\')->translatable(false);
        $form->input(\'billing_address_street\')->title(\'Street, Housenumber\')->translatable(false);
        $form->input(\'billing_address_zip\')->title(\'Zip\')->width(4)->translatable(false);
        $form->input(\'billing_address_city\')->title(\'City\')->width(8)->translatable(false);
        $form->input(\'billing_address_country\')->title(\'Country\')->translatable(false);
    });
```
            ');
        })->width(8);

        $page->card(function ($form) {
            $form->modal('billing_address')
                ->title('Billing Address')
                ->name('Edit Address')
                ->preview('
                    <div>{billing_address_first_name} {billing_address_last_name}</div>
                    <div>{billing_address_company}</div>
                    <div>{billing_address_street}</div>
                    <div>{billing_address_zip} {billing_address_city}</div>
                    <div>{billing_address_country}</div>
                    ')
                ->form(function ($form) {
                    $form->input('billing_address_first_name')->title('First Name')->width(6)->translatable(false);
                    $form->input('billing_address_last_name')->title('First Name')->width(6)->translatable(false);
                    $form->input('billing_address_company')->title('Company')->translatable(false);
                    $form->input('billing_address_street')->title('Street, Housenumber')->translatable(false);
                    $form->input('billing_address_zip')->title('Zip')->width(4)->translatable(false);
                    $form->input('billing_address_city')->title('City')->width(8)->translatable(false);
                    $form->input('billing_address_country')->title('Country')->translatable(false);
                });
        })->width(4);
    }
}
