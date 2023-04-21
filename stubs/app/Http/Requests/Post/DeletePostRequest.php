<?php

namespace App\Http\Requests\Post;

use App\Constants\Permissions;
use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can(Permissions::DELETE_POSTS);
    }

    public function rules(): array
    {
        return [];
    }
}
