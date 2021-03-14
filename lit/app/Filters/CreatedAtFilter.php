<?php

namespace Lit\Filters;

use Ignite\Crud\Filter\Filter;
use Ignite\Crud\Filter\FilterForm;
use Ignite\Support\AttributeBag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class CreatedAtFilter extends Filter
{
    /**
     * Apply field attributes to query.
     *
     * @param Builder      $query
     * @param AttributeBag $attributes
     * @var   void
     */
    public function apply($query, AttributeBag $attributes)
    {
        if ($attributes->has('created_at')) {
            $query->whereBetween('created_at', [
                (new Carbon($attributes->created_at))->startOfDay(),
                (new Carbon($attributes->created_at))->endOfDay(),
            ]);
        }
    }

    /**
     * Add filter form fields.
     *
     * @param  FilterForm $form
     * @return void
     */
    public function form(FilterForm $form)
    {
        $form->date('created_at');
    }
}
