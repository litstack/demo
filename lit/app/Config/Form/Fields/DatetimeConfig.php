<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\DatetimeController;

class DatetimeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DatetimeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/datetime';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Datetime',
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
            $form->datetime('date')
                ->width(1 / 3);

            $form->datetime('date_and_time')
                ->onlyDate(false)
                ->width(1 / 3);

            $form->datetime('time')
                ->minuteInterval(15)
                ->onlyTime(true)
                ->width(1 / 3);

            $form->group(function ($form) {
                $form->markdown('
```php
$form->datetime(\'date\')
	->width(1 / 3);
```
');
            })->width(1 / 3);

            $form->group(function ($form) {
                $form->markdown('
```php
$form->datetime(\'date_and_time\')
	->onlyDate(false)
	->width(1 / 3);
```
');
            })->width(1 / 3);

            $form->group(function ($form) {
                $form->markdown('
```php
$form->datetime(\'time\')
	->minuteInterval(15)
	->onlyTime(true)
	->width(1 / 3);
```
');
            })->width(1 / 3);
        });
    }
}
