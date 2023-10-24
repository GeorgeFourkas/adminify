<?php

namespace App\Http\Requests\Admin\Adminify\Category;

use App\Constants\Permissions;
use App\Traits\Multilingual;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    use Multilingual;

    public function authorize()
    {
        return $this->user()->can(Permissions::CREATE_CATEGORIES);
    }

    public function rules()
    {
        return [
            $this->getApplicationDefaultLocale() . '.name' => 'required',
            'parent_id' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()
            ->with('error', __("Category's name in main locale is required"));
    }
}
