<?php

namespace Lit\Config\Charts\Example;

use App\Models\Order;
use Ignite\Chart\Chart;
use Ignite\Chart\Config\DonutChartConfig as ChartConfig;

class DonutChartConfig extends ChartConfig
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
        return 'Donut Chart';
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
     * Value.
     *
     * @param  Builder $query
     * @return array
     */
    public function value($query): array
    {
        return [
            $this->count((clone $query)->where('state', 'pending')),
            $this->count((clone $query)->where('state', 'success')),
            $this->count((clone $query)->where('state', 'failed')),
        ];
    }

    /**
     * Labels.
     *
     * @return array
     */
    public function labels(): array
    {
        return [
            'Pending',
            'Success',
            'Failed',
        ];
    }
}
