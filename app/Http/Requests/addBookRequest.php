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
            'author_id' => 'required',
            'title' => 'required',
            'count_page' => 'required',
            'annotation' => '',
            'picture' => 'required|file|image|max:2048', // To 2 MB
        ];
    }

    public function messages()
    {
        return [
            'author_id.required' => 'Необходимо указать автора книги',
            'title.required'  => 'Необходимо указать название книги',
            'count_page.required'  => 'Необходимо указать число страниц',
            'picture.required' => 'Полео бязательное для заполнения',
            'picture.file' => 'Тип поля для заполнения должен быть File',
            'picture.image' => 'Тип файла должен быть изображение',
            'picture.max:2048' => 'Размер изображения должен быть меньше 2МБ',
        ];
    }
}
