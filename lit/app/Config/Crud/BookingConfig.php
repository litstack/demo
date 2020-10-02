<?php

namespace Lit\Config\Crud;

use App\Models\Booking;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\BookingController;

class BookingConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Booking::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BookingController::class;

    /**
     * Model singular and plural name.
     *
     * @param Booking|null booking
     * @return array
     */
    public function names(Booking $booking = null)
    {
        return [
            'singular' => 'Booking',
            'plural'   => 'Bookings',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'bookings';
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
            $table->col('title')->value('{title}')->sortBy('title');
        })
            ->search('title')
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
        $page->card(function ($form) {
            $form->input('title')->title('Title')->width(6);
        });
    }
}
