<?php

namespace Lit\Config\Charts;

use App\Models\Order;
use Ignite\Chart\Chart;
use Ignite\Chart\Config\NumberChartConfig;

class OrderCountNumberChartConfig extends NumberChartConfig
{
    /**
     * The model class of the chart.
     *
     * @var string
     */
    public $model = Order::class;

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Orders';
    }

    /**
     * Mount.
     *
     * @param  Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        //
    }

    /**
     * Calculate value.
     *
     * @param  Builder $query
     * @return int
     */
    public function value($query)
    {
        return $this->count($query);
    }
}
