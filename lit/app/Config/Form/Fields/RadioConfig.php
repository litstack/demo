<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\RadioController;

class RadioConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RadioController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/radio';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Radio',
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
            $form->radio('type')
                ->title('Type')
                ->options([
                    'article' => 'Article',
                    'hint'    => 'Hint',
                ]);

            $form->markdown('
```php
$form->radio(\'type\')
	->title(\'Type\')
	->options([
		\'article\' => \'Article\',
		\'hint\'    => \'Hint\',
	]);
```
			');
        });
    }
}
