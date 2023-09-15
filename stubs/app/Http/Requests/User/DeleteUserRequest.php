<?php

namespace App\Http\Requests\Admin\Adminify\User;

use App\Constants\Permissions;
use App\Rules\NotASingleAdmin;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can(Permissions::DELETE_USERS);
    }

    protected function prepareForValidation()
    {
        $this->merge(['user' => $this->route('user')]);

    }

    public function rules(): array
    {
        return [
            'user' => [new NotASingleAdmin($this->route('user'))],
        ];
    }
}
