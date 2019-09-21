<?php
namespace App\Modules\Bitcoin\Requests;

use Illuminate\Foundation\Http\FormRequest;

// не используется )) не пригодился
class getDataBitcoinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|alpha_dash|max:255',
            'date' => 'required|date_format:"Y-m-d"',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Необходимо указать названия валют (напр.: UAH-LTC)',
            'date.required'  => 'Необходимо указать дату (напр.: 2019-09-20)',
        ];
    }
}
