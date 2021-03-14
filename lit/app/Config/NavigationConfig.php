<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\CustomerConfig;
use Lit\Config\Crud\FormIndexTableAdvancedConfig;
use Lit\Config\Crud\FormIndexTableConfig;
use Lit\Config\Crud\OrderConfig;
use Lit\Config\Crud\ProductConfig;
use Lit\Config\Form\Charts\ChartsConfig;
use Lit\Config\Form\Form\AdvancedConfig;
use Lit\Config\Form\Form\FieldsConfig;
use Lit\Config\Form\Pages\HomeConfig;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation $nav
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__lit('lit.user_administration')),

            $nav->preset('user.user', [
                'icon' => fa('users'),
            ]),
            $nav->preset('permissions'),
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Form Controls'),

            $nav->preset(FieldsConfig::class, ['icon' => fa('edit')]),
            $nav->preset(AdvancedConfig::class, ['icon' => fa('plus')]),
            $nav->entry('Relations', [
                'icon' => fa('link'),
                'link' => lit()->url('form/relations/1'),
            ]),
            $nav->group([
                'title' => 'Index Table',
                'icon'  => fa('table'),
            ], [
                $nav->preset(FormIndexTableConfig::class, ['icon' => fa('columns')]),
                $nav->preset(FormIndexTableAdvancedConfig::class, ['icon' => fa('columns')]),
            ]),

            $nav->title('Charts'),
            $nav->preset(ChartsConfig::class, ['icon' => fa('chart-line')]),

        ]);

        $nav->section([
            $nav->title('Models'),

            $nav->preset(OrderConfig::class, ['icon' => fa('ticket-alt')]),
            $nav->preset(ProductConfig::class, ['icon' => fa('box-open')]),
            $nav->preset(CustomerConfig::class, ['icon' => fa('users')]),
        ]);

        $nav->section([
            $nav->title('Pages'),

            $nav->preset(HomeConfig::class, ['icon' => fa('home')]),
        ]);
    }
}
