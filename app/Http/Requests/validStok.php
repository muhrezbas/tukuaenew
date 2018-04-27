<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validStok extends FormRequest
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
          'stok_ukuran' => 'numeric|digits_between:1,100',
        
        ];
    }
     public function messages()
    {
        return [
        
           

           'stok_ukuran.digits_between' => 'Kolom stok stok_ukuran maksimal 100 karakter.',
           'stok_ukuran.numeric' => ' kolom stok ukuran harus angka.',
           
           
        ];
    }
}
