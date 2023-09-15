<?php

namespace App\Http\Requests\Admin\Adminify\User;

use App\Constants\Permissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUsersPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can(Permissions::UPDATE_USERS_PASSWORDS);
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'same:password_confirmation', Password::defaults()],
            'password_confirmation' => ['required', 'string', 'same:password', Password::defaults()],
        ];
    }
}
