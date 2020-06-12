<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailUniquePerEstablishmentBranch implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $userService = resolve('App\Services\Security\UserService');
        $user = $userService->getUserByEmailEstablishmentBranch($value, session('establishment_branch_id'));
        return $user==null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email ya existe.';
    }
}
