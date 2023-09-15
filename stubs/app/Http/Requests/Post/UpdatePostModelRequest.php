<?php

namespace App\Http\Requests\Admin\Adminify\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostModelRequest extends FormRequest
{
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
            $defaultLocale . '.featured_image_url' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            '%title%' => __('adminify.post_title'),
            '%body%' => __('adminify.post_body'),
            '%featured_image_url%' => __('adminify.post_featured_image'),
        ];
    }
}
