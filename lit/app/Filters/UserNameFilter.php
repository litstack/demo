<?php

namespace Lit\Filters;

use Ignite\Crud\Filter\Filter;
use Ignite\Crud\Filter\FilterForm;
use Ignite\Support\AttributeBag;
use Illuminate\Database\Eloquent\Builder;

class UserNameFilter extends Filter
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
        if ($attributes->has('name')) {
            $query->whereHas('user', function ($userQuery) use ($attributes) {
                $userQuery->where('name', 'LIKE', "%{$attributes->name}%");
            });
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
        $form->input('name');
    }
}
