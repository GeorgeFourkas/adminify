<?php

namespace App\Http\Requests\Admin\Adminify\User;

use App\Constants\Permissions;
use App\Rules\FileOrString;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can(Permissions::UPDATE_USERS);
    }

    public function rules(): array
    {
        return [
            'role' => ['required', 'string', Rule::in(Role::all()->pluck('name')->toArray())],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'profile_picture_url' => ['nullable', new FileOrString()],
        ];
    }
}
