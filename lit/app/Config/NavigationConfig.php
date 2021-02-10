<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\CustomerConfig;
use Lit\Config\Crud\OrderConfig;
use Lit\Config\Crud\ProductConfig;
use Lit\Config\Form\Fields\BooleanConfig;
use Lit\Config\Form\Fields\CheckboxesConfig;
use Lit\Config\Form\Fields\ConditionsConfig;
use Lit\Config\Form\Fields\DatetimeConfig;
use Lit\Config\Form\Fields\IconConfig;
use Lit\Config\Form\Fields\ImageConfig;
use Lit\Config\Form\Fields\InputConfig;
use Lit\Config\Form\Fields\ListFieldConfig;
use Lit\Config\Form\Fields\ModalConfig;
use Lit\Config\Form\Fields\PasswordConfig;
use Lit\Config\Form\Fields\RadioConfig;
use Lit\Config\Form\Fields\RangeConfig;
use Lit\Config\Form\Fields\RelationConfig;
use Lit\Config\Form\Fields\RouteConfig;
use Lit\Config\Form\Fields\WysiwygConfig;
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
            $nav->title('Docs'),

            $nav->group([
                'title' => 'Fields',
                'icon'  => fa('bars'),
            ], [
                $nav->preset(BooleanConfig::class, ['icon' => fa('heading')]),
                $nav->preset(CheckboxesConfig::class, ['icon' => fa('heading')]),
                $nav->preset(DatetimeConfig::class, ['icon' => fa('heading')]),
                $nav->preset(IconConfig::class, ['icon' => fa('heading')]),
                $nav->preset(ImageConfig::class, ['icon' => fa('heading')]),
                $nav->preset(InputConfig::class, ['icon' => fa('heading')]),
                $nav->preset(ListFieldConfig::class, ['icon' => fa('heading')]),
                $nav->preset(ModalConfig::class, ['icon' => fa('heading')]),
                $nav->preset(PasswordConfig::class, ['icon' => fa('heading')]),
                $nav->preset(RadioConfig::class, ['icon' => fa('heading')]),
                $nav->preset(RangeConfig::class, ['icon' => fa('heading')]),
                $nav->preset(RelationConfig::class, ['icon' => fa('heading')]),
                $nav->preset(RouteConfig::class, ['icon' => fa('heading')]),
                $nav->preset(WysiwygConfig::class, ['icon' => fa('heading')]),
                $nav->preset(ConditionsConfig::class, ['icon' => fa('heading')]),
            ]),

        ]);

        $nav->section([
            $nav->title('Models'),

            $nav->preset(OrderConfig::class, ['icon' => fa('money-bill-wave')]),
            $nav->preset(ProductConfig::class, ['icon' => fa('box-open')]),
            $nav->preset(CustomerConfig::class, ['icon' => fa('users')]),
        ]);

        $nav->section([
            $nav->title('Pages'),

            $nav->preset(HomeConfig::class, ['icon' => fa('home')]),
        ]);
    }
}
