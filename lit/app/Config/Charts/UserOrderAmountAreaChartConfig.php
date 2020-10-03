<?php

namespace Lit\Config\Charts;

use App\Models\User;
use Ignite\Chart\Chart;
use Ignite\Chart\Config\AreaChartConfig;

class UserOrderAmountAreaChartConfig extends AreaChartConfig
{
    /**
     * The model class of the chart.
     *
     * @var string
     */
    public $model = User::class;

    /**
     * Name of the relationship for the given model.
     *
     * @var string
     */
    public $relation = 'orders';

    /**
     * Chart title.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Amount Spent';
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
