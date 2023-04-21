<?php

namespace App\Http\Requests\User;

use App\Constants\Permissions;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can(Permissions::DELETE_USERS);
    }

    public function rules(): array
    {
        return [];
    }
}
