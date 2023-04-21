<?php

namespace App\Http\Requests\Post;

use App\Constants\Permissions;
use App\Traits\Multilingual;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostModelRequest extends FormRequest
{
    use Multilingual;


    public function authorize(): bool
    {
        return $this->user()->can(Permissions::CREATE_POSTS);
    }


    public function rules(): array
    {
        $defaultLocale = $this->getStore()->get('default_locale');
        // Only the default locale's fields are required to create a post. If not values are found default locale's values are returned
        return [
            $defaultLocale . '.title' => 'required',
            $defaultLocale . '.body' => 'required',
            $defaultLocale . '.featured_image_url' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            $this->defaultLocale . '.title' => __('Title'),
            $this->defaultLocale . '.body' => __('Post Body'),
            $this->defaultLocale . '.featured_image_url' => __('Post Featured Image'),
        ];
    }
}
