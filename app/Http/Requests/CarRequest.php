<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'marka'=>'required',
            'model'=>'required',
            'registarski_broj'=>'required',
            'cijena_po_danu'=>'required',
            'godina_proizvodnje'=>'required'

        ];
    }

    public function messages()
    {
        return [
            'marka.required'=>"Marka automobila je obavznopolje",
            'model.required'=>"Model automobila je obavezno polje",
            'registarski_broj'=>"Registarski broj automobila je obavzno polje",
            'cijena_po_danu'=>"Cijena iznajmljivanja automobila po danu je obavezno polje",
            'godina_proizvodnje'=>"Godina proizvodnje automobila je obavznopolje"
        ];
    }
}
