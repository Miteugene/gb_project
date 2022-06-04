<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'string|min:1|max:250',
            'author'      => 'string|min:1|max:50',
            'status'      => '',
            'image'       => '',
            'text'        => 'string|min:1',
            'category_id' => '',
        ];
    }
}
