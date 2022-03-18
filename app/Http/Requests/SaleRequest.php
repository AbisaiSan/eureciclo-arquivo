<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'csv' => 'required|file'
        ];
    }
    public function messages()
    {
        return  [
            'csv.required' => 'Este campo título é obrigatório',
            'required'       => 'Este campo é obrigatório',
            'min'            => 'Este campo não atinge o mínimo de caracteres permitidos. Tamanho mínimo permitido :min',
            'image'          => 'Arquivo de imagem inválido!'
        ];
    }
}
