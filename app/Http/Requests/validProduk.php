<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validProduk extends FormRequest
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
           

            
         
        ];
    }
    public function messages()
    {
        return [
           'potonganharga.numeric' => ' Kolom potongan harga harus.',
           'startpotongan.numeric' => ' Payment Code field is required.',
           'kelipatanpotongan.max' => ' kelipatanpotongan field is required.',
           'kelipatanpotongan.numeric' => ' kelipatanpotongan must be number.',
            'diskon.max' => 'diskon hanya 3 angka'
           'berat.numeric' => ' Your Account Number field is required.',
          
          
           'harga.numeric' => ' harga field is required.',
           'startpotongan.min' => ' Your Payment Code must be at least 16 characters.',
           'kelipatanpotongan.min' => ' kelipatanpotongan Transfer must be at least 5 characters.',
           
           
        ];
    }
}
