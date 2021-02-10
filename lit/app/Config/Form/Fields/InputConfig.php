<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\InputController;

class InputConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = InputController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/input';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Input',
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
            $form->input('text')
                ->translatable(false)
                ->rules('min:10', 'max:50');

            $form->markdown('
```php
$form->input(\'text\')
	->translatable(false)
	->rules(\'min:10\', \'max:50\');
```
');
        });

        $page->card(function ($form) {
            $form->input('credit_card')
                ->title('Input Field With Credit Card Mask')
                ->placeholder('4242 4242 4242 4242')
                ->mask([
                    'creditCard' => true,
                ]);

            $form->markdown('
```php
$form->input(\'credit_card\')
	->placeholder(\'4242 4242 4242 4242\')
	->mask([
		\'creditCard\' => true,
	]);
```
');
        });
    }
}
