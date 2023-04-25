<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class NotASingleAdmin implements Rule
{
    /**
     * Create a new rule instance.S
     *
     * @return void
     */

    public User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        if ($this->user->hasRole('administrator')) {

            return User::whereHas('roles', function ($query) {
                    $query->where('name', 'administrator');
                })->count() > 1;
        }
        return true;
    }

    public function message(): string
    {
        return __('You can not delete the only administrator on the website. Promote at least a user to administrator to delete.');
    }
}
