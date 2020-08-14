<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeLeadPost extends FormRequest
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
            'nombre'=>'required| regex:/(\w.+\s).+/i',
            'email' => 'email'  ,
            'telefono'=>'min:10 | max:10',
        ];
    }
}
