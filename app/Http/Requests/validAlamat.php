<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validAlamat extends FormRequest
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
            'alamat' => 'required',
            'telp' => 'required|min:7|numeric', 
            'kodepos' => 'required|numeric|digits:5', 
        ];
    }
    public function messages()
    {
        return [
           'alamat.required' => ' Street field is required.',
           'telp.required' => ' Phone number field is required.',
           'kodepos.required' => ' ZIP field is required.',
           'telp.min' => ' Phone Number must be at least 7 characters.',
           'kodepos.digits' => ' ZIP must be at least 5 characters..',
           'kodepos.numeric' => "ZIP must be number",
           
        ];
    }
}
