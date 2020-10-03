<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\CustomerConfig;
use Lit\Config\Crud\OrderConfig;
use Lit\Config\Crud\ProductConfig;

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
            $nav->title('Models'),

            $nav->preset(OrderConfig::class, ['icon' => fa('money-bill-wave')]),
            $nav->preset(ProductConfig::class, ['icon' => fa('box-open')]),
            $nav->preset(CustomerConfig::class, ['icon' => fa('users')]),
        ]);
    }
}
