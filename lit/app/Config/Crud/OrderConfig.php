<?php

namespace Lit\Config\Crud;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Product;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Ignite\Search\Result;
use Ignite\Support\Vue\InfoComponent;
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

    public function searchResult(Result $result, Order $order)
    {
        $result
            ->title("Order #{$order->id}")
            ->description($order->products()->count().' Products.')
            ->hint("Created By {$order->user->name}")
            ->icon(fa('shopping-cart'));
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
            $table->relation('user', CustomerConfig::class)->value('{user.name}')->sortBy('user.name');
            $table->col('Payment')->value('provider', [
                'apple-pay' => '<span style="color: #24397c;font-size: 30px;">'.fa('fab', 'cc-apple-pay').'</span>',
                'stripe'    => '<span style="color: #6772e5;font-size: 30px;">'.fa('fab', 'cc-stripe').'</span>',
                'paypal'    => '<span style="color: #24397c;font-size: 30px;">'.fa('fab', 'cc-paypal').'</span>',
            ]);
            $table->col('State')->value('state', [
                'success'  => '<div class="badge badge-success">{state}</div>',
                'canceled' => '<div class="badge badge-danger">{state}</div>',
                'pending'  => '<div class="badge badge-info">{state}</div>',
            ])->sortBy('state');
            $table->money('amount', 'EUR', 'de_DE')->small();
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
                    'success'  => 'success',
                    'canceled' => 'canceled',
                    'pending'  => 'pending',
                ],
            ])
            ->action('Send Mail', SendMailAction::class)
            ->search('user.name')
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
        $page->query(function ($query) {
            $query->with('user')->withCount('products');
        });
        $page->headerLeft()
            ->component(new InfoComponent('lit-info'))
            ->prop('style', 'padding: 0;')
            ->title('')
            ->text('{readable_created_at}');

        $page->group(function ($page) {
            $page->card(function ($page) {
                $page->component('order-payment-info');
            });
            $page->card(function ($form) {
                $form->relation('unique_products')->preview(function ($preview) {
                    $preview->image()->src('{preview_image.conversion_urls.sm}')->small();
                    $preview->col('Title')->value('{title}');
                    $preview->col('Quantity')->value('{quantity}')->right();
                })->withPivotAttributes(function (Order $order, Product $product) {
                    return ['price' => $product->price];
                })->readOnly()->showTableHead();
            })->title('Ordered Products');
        })->width(8);

        $page->group(function ($page) {
            $page->card(function ($form) {
                $form->info()
                    ->text('<div class="d-flex justify-content-between"><span>State:</span><span>{state_badge}</span></div>')
                    ->text('<div class="d-flex justify-content-between"><span>Created At:</span><span>{readable_created_at}</span></div>')
                    ->text('<div class="d-flex justify-content-between"><span>Customer:</span><a href="/admin/customers/{user.id}">{user.name}</a></div>');
            })->secondary();

            $page->card(function ($form) {
                $form->modal('billing_address')
                    ->title('Billing Addresse')
                    ->name('Edit Address')
                    ->preview('
                    <div>{billing_address_first_name} {billing_address_last_name}</div>
                    <div>{billing_address_company}</div>
                    <div>{billing_address_street}</div>
                    <div>{billing_address_zip} {billing_address_city}</div>
                    <div>{billing_address_country}</div>
                    ')
                    ->form(function ($form) {
                        $form->input('billing_address_first_name')->title('First Name')->width(6);
                        $form->input('billing_address_last_name')->title('First Name')->width(6);
                        $form->input('billing_address_company')->title('Company');
                        $form->input('billing_address_street')->title('Street, Housenumber');
                        $form->input('billing_address_zip')->title('Zip')->width(4);
                        $form->input('billing_address_city')->title('City')->width(8);
                        $form->input('billing_address_country')->title('Country');
                    });
            });
        })->width(4);
    }
}
