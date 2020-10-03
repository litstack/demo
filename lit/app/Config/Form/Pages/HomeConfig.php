<?php

namespace Lit\Config\Form\Pages;

use App\Models\Product;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'pages/home';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Home',
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
                $form->input('headline');
                $form->image('header_image')->expand()->maxFiles(1);
                $form->wysiwyg('text');
            });

            $page->card(function ($form) {
                $form->manyRelation('products')
                    ->model(Product::class)
                    ->hint('Select the products that should be featured on the front page.');
            })->title('Featured');
        })->width(8);
        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->boolean('live')->hint('Wether the site is available to the public.');

                // ...
            });
        })->width(4);
    }
}
