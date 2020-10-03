<?php

namespace Lit\Http\Controllers\Crud;

use Ignite\Crud\Controllers\CrudController;
use Lit\Models\User;

class OrderController extends CrudController
{
    /**
     * Authorize request for authenticated lit-user and permission operation.
     * Operations: create, read, update, delete.
     *
     * @param  User   $user
     * @param  string $operation
     * @param  int    $id
     * @return bool
     */
    public function authorize(User $user, string $operation, $id = null): bool
    {
        return $user->can("{$operation} orders");
    }
}
