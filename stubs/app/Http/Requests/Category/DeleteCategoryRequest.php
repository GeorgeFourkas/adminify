<?php

namespace App\Http\Requests\Category;

use App\Constants\Permissions;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can(Permissions::DELETE_CATEGORIES);
    }


    public function rules(): array
    {
        return [];
    }
}
