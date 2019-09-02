<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addNewsRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => '',
            'short_description' => 'required',
            'full_description' => 'required',
            'publicated_at' => '',
            'created_at' => '',
            'updated_at' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Необходимо указать "Название новости"',
            'short_description.required' => 'Поле обязательное для заполнения',
            'full_description.required' => 'Поле обязательное для заполнения',
        ];
    }
}
