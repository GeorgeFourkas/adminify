<?php

namespace App\Http\Requests\Admin\Adminify\Category;

use App\Constants\Permissions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Permissions::CREATE_CATEGORIES);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            config('app.fallback_locale') . '.name' => 'required',
            'parent_id' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()
            ->with('error', __("Category's name in main locale is required"));
    }
}
