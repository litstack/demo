<?php

namespace Lit\Config\Charts\Example;

use App\Models\Order;
use Ignite\Chart\Chart;
use Ignite\Chart\Config\AreaChartConfig as ChartConfig;

class AreaChartConfig extends ChartConfig
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
        return 'Area Chart';
    }

    /**
     * Mount.
     *
     * @param  Chart $chart
     * @return void
     */
    public function mount(Chart $chart)
    {
        $chart->currency('€');
    }

    /**
     * Calculate value.
     *
     * @param  Builder $query
     * @return int
     */
    public function value($query)
    {
        return $this->sum($query, 'amount');
    }
}
