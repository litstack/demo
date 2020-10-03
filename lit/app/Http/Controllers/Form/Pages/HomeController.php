<?php

namespace Lit\Http\Controllers\Form\Pages;

use Ignite\Crud\Controllers\FormController;
use Lit\Models\User;

class HomeController extends FormController
{
    /**
     * Authorize request for authenticated lit-user and permission operation.
     * Operations: read, update
     *
     * @param User $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(User $user, string $operation): bool
    {
        return true;
    }
}
