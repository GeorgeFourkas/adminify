<?php

namespace App\Http\Requests\Admin\Adminify\Post;

use App\Traits\Multilingual;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostModelRequest extends FormRequest
{

    use Multilingual;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update-posts');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $defaultLocale = $this->getStore()->get('default_locale');

        return [
            $defaultLocale . '.title' => 'required',
            $defaultLocale . '.body' => 'required',
        ];
    }

    public function attributes(): array
    {
        $defaultLocale = $this->getStore()->get('default_locale');

        return [
            $defaultLocale . '.title' => __('adminify.post_title'),
            $defaultLocale . '.body' => __('adminify.post_body'),
        ];
    }
}
