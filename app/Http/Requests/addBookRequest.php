<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addBookRequest extends FormRequest
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
            //'user_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'count_page' => 'required',
            'annotation' => '',
            'picture' => '',
        ];
    }

    public function messages()
    {
        return [
            'author_id.required' => 'Необходимо указать автора книги',
            'title.required'  => 'Необходимо указать название книги',
            'count_page.required'  => 'Необходимо указать число страниц',
        ];
    }
}
