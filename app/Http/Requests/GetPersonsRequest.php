<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPersonsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'offset' => 'date_format:"Y-m-d"',
        ]);
    }
    
    // Validate for rules 
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return response()->json([
                'info' => 'DEMO API по предоставлению пользователей (отсортировано по дате обновления) от 01/09/2019',
                'site' => 'http://makklays.com.ua',
                'error' => 'Параметр offset - не корректного формата (YYYY-mm-dd)',
            ], 404);
        }
    }
}
