<?php

namespace Lit\Config\Crud;

use App\Models\Product;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\ProductController;

class ProductConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Product::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProductController::class;

    /**
     * Model singular and plural name.
     *
     * @param Product|null product
     * @return array
     */
    public function names(Product $product = null)
    {
        return [
            'singular' => $product->title ?? 'Product',
            'plural'   => 'Products',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'products';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->col('Title')->value('{title}')->sortBy('title');
            $table->col('Sold')->value('{orders_count}')->sortBy('orders_count')->small()->right();
        })
            ->search('title')
            ->query(function ($query) {
                $query->withCount('orders');
            })
            ->sortBy([
                'id.desc' => __lit('lit.sort_new_to_old'),
                'id.asc'  => __lit('lit.sort_old_to_new'),
            ]);
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->input('title');
                $form->wysiwyg('description');
            });

            $page->card(function ($form) {
                $form->relation('orders')->readOnly();
            })->title('Product Orders');
        })->width(8);

        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->datetime('publish_at')
                    ->title('Publish At')
                    ->onlyDate(false)
                    ->hint('From when the product will be available.');
            });
        })->width(4);
    }
}
