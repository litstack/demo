<?php

namespace Lit\Config;

use Ignite\Search\Search;
// use Ignite\Search\SearchConfig as Config;
use Lit\Config\Crud\CustomerConfig;
use Lit\Config\Crud\OrderConfig;
use Lit\Config\Crud\ProductConfig;

// class SearchConfig extends Config
class SearchConfig
{
    public function main(Search $search)
    {
        $search
            ->add(OrderConfig::class)
            ->add(ProductConfig::class)
            ->add(CustomerConfig::class);
    }
}
