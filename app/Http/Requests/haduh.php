<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validProdukAdmin extends FormRequest
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
            
            'startpotongan' => 'numeric|digits_between:1,3',
            'kelipatanpotongan' => 'numeric|digits_between:1,3',
            'berat' => 'numeric|digits_between:1,10',
            'harga' => 'numeric|digits_between:1,100',
            'diskon'=> 'numeric|digits_between:1,3',
        ];
    }
    public function messages()
    {
        return [
        
           'startpotongan.numeric' => ' Kolom jumlah potongan awal barang harus angka.',
           'kelipatanpotongan.digits_between' => 'kolom jumlah kelipatan harga maksimal 3 karakter.',
           'kelipatanpotongan.numeric' => 'kolom jumlah kelipatan harga harus angka.',
            'diskon.digits_between' => 'kolom diskon maksimal 3 karakter'
             'diskon.digits_between' => 'kolom diskon harus angka'

           'berat.numeric' => ' Kolom berat harus angka.',
            'berat.digits_between' => ' Kolom berat maksimal 10 karakter.',
          
          
          
           'harga.numeric' => ' kolom harga harus angka.',
           'harga.digits_between' => ' kolom harga maksimal 100 karakter.',

           'startpotongan.digits_between' => 'Kolom jumlah potongan awal barang maksimal 3 karakter.',
           'kelipatanpotongan.numeric' => ' kolom jumlah kelipatan harga harus angka.',
           
           
        ];
    }
}
