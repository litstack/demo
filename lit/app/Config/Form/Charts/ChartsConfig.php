<?php

namespace Lit\Config\Form\Charts;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Config\Charts\Example\AreaChartConfig;
use Lit\Config\Charts\Example\BarChartConfig;
use Lit\Config\Charts\Example\DonutChartConfig;
use Lit\Config\Charts\Example\NumberChartConfig;
use Lit\Config\Charts\Example\ProgressChartConfig;
use Lit\Http\Controllers\Form\Charts\ChartsController;

class ChartsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ChartsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'charts';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Charts',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->chart(NumberChartConfig::class)->height('130px')->width(1 / 3)->variant('secondary');
        $page->chart(ProgressChartConfig::class)->height('185px')->width(1 / 3);
        $page->chart(DonutChartConfig::class)->height('185px')->width(1 / 3)->variant('secondary');
        $page->chart(AreaChartConfig::class)->height('120px');
        $page->chart(BarChartConfig::class)->height('120px')->variant('white');
    }
}
