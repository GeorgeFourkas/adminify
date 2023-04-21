<?php

namespace App\Http\Requests\Tag;

use App\Constants\Permissions;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTagRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can(Permissions::DELETE_TAGS);
    }

    public function rules(): array
    {
        return [];
    }
}
