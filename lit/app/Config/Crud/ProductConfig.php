<?php

namespace Lit\Config\Crud;

use App\Models\Product;
use App\Models\States\ProductState;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Ignite\Search\Result;
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

    public function searchResult(Result $result, Product $product)
    {
        $result
            ->title($product->title)
            ->description($product->description)
            ->image($product->preview_image)
            ->createdAt(null);
    }

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
            $table->image()->src('{preview_image.conversion_urls.sm}')->small();
            $table->col('Title')->value('{title}')->sortBy('title');
            $table->col('State')->value('state', [
                ProductState::ACTIVE => '<span class="badge badge-success">active</span>',
                ProductState::DRAFT  => '<span class="badge badge-light">draft</span>',
            ])->sortBy('state');
            $table->money('price', 'EUR', 'de_DE');
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
                $form->input('title')->width(8)->creationRules('required');
                $form->input('price')->type('number')->append('€')->width(4)->creationRules('required');
                $form->wysiwyg('description');
            });

            $page->card(function ($form) {
                $form->image('images')->maxFiles(5)->firstBig();
            });
        })->width(8);

        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->select('state')->title('Productstate')->options([
                    ProductState::ACTIVE => 'Active',
                    ProductState::DRAFT  => 'Draft',
                ]);
                $form->datetime('publish_at')
                    ->title('Publish At')
                    ->onlyDate(false)
                    ->hint('From when the product will be available.');
            });

            $page->card(function ($form) {
                $form->query(function ($query) {
                    $query
                        ->withCount('orders')
                        ->withRevenue()
                        ->withCustomersCount();
                });
                $form->info('Insights')->text('{orders_count} units sold to {customers_count} customers for {readable_revenue} gross revenue.');
            })->secondary();
        })->width(4);
    }
}
