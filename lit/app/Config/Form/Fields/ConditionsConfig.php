<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\ConditionsController;

class ConditionsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ConditionsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/conditions';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Conditions',
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
            $form->select('type')
                ->options([
                    'news' => 'News',
                    'blog' => 'Blog',
                ])
                ->title('Type');

            $form->input('news_title')
                ->title('Title')
                ->when('type', 'news');

            $form->markdown('
```php
$form->select(\'type\')
	->options([
		\'news\' => \'News\',
		\'blog\' => \'Blog\',
	])
	->title(\'Type\');

$form->input(\'news_title\')
	->title(\'Title\')
	->when(\'type\', \'news\');
```
			');
        });
    }
}
