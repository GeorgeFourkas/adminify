<?php

namespace App\Http\Requests\Admin\Adminify\User;

use App\Constants\Permissions;
use App\Rules\FileOrString;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CreateUserModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can(Permissions::CREATE_USERS);
    }

    public function rules(): array
    {
        return [
            'role' => ['required', 'string', Rule::in(Role::all()->pluck('name')->toArray())],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'string', 'same:confirm_password'],
            'confirm_password' => ['required', 'string', 'same:password'],
            'profile_picture_url' => [new FileOrString()],
        ];
    }
}
