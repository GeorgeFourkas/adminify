<?php

namespace App\Http\Requests\Admin\Adminify\Category;

use const _PHPStan_11268e5ee\__;

use App\Constants\Permissions;
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
            config('app.fallback_locale').'.name' => 'required',
            'parent_id' => [function ($attribute, $val, $fail) {
                if ((int) $val == $this->route('category')?->id) {
                    $fail(__('adminify.errors.category_same_as_parent'));
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            config('app.fallback_locale').'.name.required' => __('adminify.errors.category_name_required'),
        ];
    }

    //    protected function failedValidation(Validator $validator)
    //    {
    //        return redirect()->back()
    //            ->with('error', __("Category's name in main locale is required"));
    //    }
}
