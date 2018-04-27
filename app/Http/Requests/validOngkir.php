<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validOngkir extends FormRequest
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
            'ongkir' => 'required',
        ];
    }
    public function messages()
    {
        return [
           'ongkir.required' => 'Please choose at least 1 Delivery Method.',
        ];
    }
}
