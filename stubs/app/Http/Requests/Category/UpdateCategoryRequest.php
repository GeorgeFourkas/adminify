<?php

namespace App\Http\Requests\Category;

use App\Constants\Permissions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can(Permissions::UPDATE_CATEGORIES);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            config('app.fallback_locale').'.name' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()
            ->with('error', __('Categories name in main locale is required'));
    }
}
