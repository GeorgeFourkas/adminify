<?php

namespace App\Http\Requests\Post;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
        return [];
    }

    public function attributes(): array
    {
        return [
            '%title%' => __('Title'),
            '%body%' => __('Post Body'),
            '%featured_image_url%' => __('Post Featured Image'),
        ];
    }
}
