<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validKonfirmasi extends FormRequest
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
            'tanggal' => 'required',
            'kode' => 'required|min:16',
            'nominal' => 'required|min:5|numeric',
            'bukti' => 'required',
            'no_rek' => 'required|numeric',
            'atas_nama' => 'required',
             'bank' => 'required',
         
        ];
    }
    public function messages()
    {
        return [
           'tanggal.required' => ' Date field is required.',
           'kode.required' => ' Payment Code field is required.',
           'nominal.required' => ' Nominal field is required.',
           'nominal.numeric' => ' Nominal must be number.',
           'bukti.required' => ' Please upload your photo transaction.',
           'no_rek.required' => ' Your Account Number field is required.',
           'no_rek.numeric' => ' Your Account Number must be number.',
           'atas_nama.required' => ' Account Name field is required.',
           'bank.required' => ' Bank field is required.',
           'kode.min' => ' Your Payment Code must be at least 16 characters.',
           'nominal.min' => ' Nominal Transfer must be at least 5 characters.',
           
           
        ];
    }
}
