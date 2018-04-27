<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validRekeningAdmin extends FormRequest
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
                   'no_rek' => 'numeric|digits_between:1,30',
        ];
    }
     public function messages()
    {
        return [
        
           

           'no_rek.digits_between' => 'Kolom nomor rekening maksimal 30 karakter.',
           'no_rek.numeric' => ' kolom nomor rekening harus angka.',
           
           
        ];
    }
}
