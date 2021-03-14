<?php

namespace Lit\Config\Charts\Example;

use App\Models\Order;
use Ignite\Chart\Chart;
use Ignite\Chart\Config\ProgressChartConfig as ChartConfig;

class ProgressChartConfig extends ChartConfig
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
        return 'Progress Chart';
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

    /**
     * Get goal value.
     *
     * @return int|float
     */
    public function goal()
    {
        return 1000;
    }
}
