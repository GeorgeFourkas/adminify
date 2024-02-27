<?php

namespace App\Http\Requests\Admin\Adminify\Category;

use App\Constants\Permissions;
use App\Traits\Multilingual;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    use Multilingual;

    public function authorize()
    {
        return $this->user()->can(Permissions::CREATE_CATEGORIES);
    }

    public function rules(): array
    {
        return [
            config('app.fallback_locale').'.name' => 'required',
            'parent_id' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            config('app.fallback_locale').'.name.required' => __("Category's name in main locale is required"),
        ];
    }
}
