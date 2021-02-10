<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\RangeController;

class RangeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RangeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/range';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Range',
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
            $form->range('range')
                ->min(1)
                ->max(20)
                ->step(1)
                ->hint('Range.');

            $form->markdown('
```php
$form->range(\'range\')
	->min(1)
	->max(20)
	->step(1)
	->hint(\'Range.\');
```
			');
        });
    }
}
