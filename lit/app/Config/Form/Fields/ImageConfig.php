<?php

namespace Lit\Config\Form\Fields;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\ImageController;

class ImageConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ImageController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/image';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Image',
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
        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->image('croppable_image')
                    ->maxFiles(1)
                    ->crop(16 / 9);

                $form->markdown('
Single image that can be cropped.

```php
$form->image(\'croppable_image\')
    ->maxFiles(1)
    ->crop(16 / 9);
```
                ');
            });

            $page->card(function ($form) {
                $form->image('images')
                    ->firstBig()
                    ->maxFiles(5);

                $form->markdown('
Single image that can be cropped.

```php
$form->image(\'images\')
    ->firstBig()
    ->maxFiles(5);
```
                ');
            });
        })->width(6);

        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->image('expanded_image')
                    ->maxFiles(1)
                    ->expand()
                    ->hint('Header image.');

                $form->markdown('
Single image with full preview as a header image.

```php
$form->image(\'expanded_image\')
    ->maxFiles(1)
    ->expand()
    ->hint(\'Header image.\');
```
                ');
            });
        })->width(6);
    }
}
