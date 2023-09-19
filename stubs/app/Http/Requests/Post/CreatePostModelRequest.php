<?php

namespace App\Http\Requests\Admin\Adminify\Post;

use App\Constants\Permissions;
use App\Traits\Multilingual;
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
        return [
            $defaultLocale . '.title' => 'required',
            $defaultLocale . '.body' => 'required',

            'featured_image_url' => 'required',
        ];
    }

    public function attributes(): array
    {
        $defaultLocale = $this->getStore()->get('default_locale');

        return [
            $defaultLocale . '.title' =>  __('adminify.post_title'),
            $defaultLocale . '.body' =>__('adminify.post_body'),
        ];
    }
}
