<?php

namespace Lit\Config\Crud;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Product;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Actions\Booking\SendMailAction;
use Lit\Config\Charts\OrderAmountAreaChartConfig;
use Lit\Config\Charts\OrderCountNumberChartConfig;
use Lit\Http\Controllers\Crud\OrderController;

class OrderConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Order::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = OrderController::class;

    /**
     * Model singular and plural name.
     *
     * @param Order|null booking
     * @return array
     */
    public function names(Order $booking = null)
    {
        return [
            'singular' => 'Order',
            'plural'   => 'Orders',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'orders';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->chart(OrderCountNumberChartConfig::class)->width(1 / 3)->height('120px')->variant('secondary');
        $page->chart(OrderAmountAreaChartConfig::class)->width(2 / 3)->height('120px')->variant('primary');

        $page->table(function ($table) {
            $table->col('ID')->value('#{id}')->sortBy('id')->small();
            $table->col('User')->value('{user.name}')->sortBy('user.name');
            $table->money('amount', 'EUR', 'de_DE')->small();
            $table->col('Provider')->value('provider', [
                'mollie' => '<div class="badge text-white" style="background:#0077ff;">m</div> Mollie',
                'stripe' => '<div class="badge text-white" style="background:#6773e5;">S</div> Stripe',
                'paypal' => '<div class="badge text-white" style="background:#105298;">P</div> Paypal',
            ])->sortBy('provider');
            $table->col('State')->value('state', [
                'success'  => '<div class="badge badge-success">{state}</div>',
                'canceled' => '<div class="badge badge-danger">{state}</div>',
                'pending'  => '<div class="badge badge-info">{state}</div>',
            ])->sortBy('state');
            $table->actions(['Send Mail' => SendMailAction::class]);
        })
            ->query(function ($query) {
                $query->with('user');
            })
            ->filter([
                'Provider' => [
                    'mollie' => 'Mollie',
                    'stripe' => 'Stripe',
                    'paypal' => 'Paypal',
                ],
                'State' => [
                    'success' => 'success',
                    'stripe'  => 'canceled',
                    'pending' => 'pending',
                ],
            ])
            ->action('Send Mail', SendMailAction::class)
            ->search('user.name', 'provider')
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
                $form->relation('products')->preview(function ($preview) {
                    $preview->col('Title')->value('{title}');
                })->withPivotAttributes(function (Order $order, Product $product) {
                    return ['price' => $product->price];
                });
            })->title('Ordered Products');
        })->width(8);

        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->datetime('created_at')
                    ->title('Ordered At')
                    ->formatted('lll')
                    ->onlyDate(false)
                    ->readOnly()
                    ->hint('When the order was created.');
            });
        })->width(4);
    }
}
