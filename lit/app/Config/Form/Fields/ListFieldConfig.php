<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\ListFieldController;

class ListFieldConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ListFieldController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/list';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'List',
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
            $form->list('menue')
                ->previewTitle('{title}')
                ->form(function ($form) {
                    $form->input('title');
                });

            $form->markdown('
```php
$form->list(\'menue\')
	->previewTitle(\'{title}\')
	->form(function ($form) {
		$form->input(\'title\');
	});
```
				');
        });
    }
}
