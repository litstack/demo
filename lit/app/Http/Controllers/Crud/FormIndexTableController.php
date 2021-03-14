<?php

namespace Lit\Http\Controllers\Crud;

use Ignite\Crud\Controllers\CrudController;
use Illuminate\Contracts\Auth\Access\Authorizable;

class FormIndexTableController extends CrudController
{
    /**
     * Authorize request for authenticated lit-user and permission operation.
     * Operations: create, read, update, delete.
     *
     * @param  Authorizable $user
     * @param  string       $operation
     * @param  int          $id
     * @return bool
     */
    public function authorize(Authorizable $user, string $operation, $id = null): bool
    {
        // return $user->can("{$operation} form_relations");
        return true;
    }
}
