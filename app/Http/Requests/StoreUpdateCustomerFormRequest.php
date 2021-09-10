<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCustomerFormRequest extends FormRequest
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
            'name' => 'required|unique:customers|max:150|string',
            'cpf' => 'unique:customers|min:11|max:11',
            'rg' => 'unique:customers|min:8|max:8',
            'cnpj' => 'unique:customers|min:14|max:14',
            'email' => 'unique:customers|min:10|max:100|email',
            'cellphone' => 'required|unique:customers|min:8|max:8',
            'telephone' => 'min:8|max:8',
            'cep' => 'required|min:8|max:8',
            'uf' => 'required|min:2|max:2|string',
            'public_place' => 'required|max:100|string',
            'city' => 'required|string|max:50',
            'county' => 'required|string|max:50',
            'complement' => 'string|max:50',
            'comments' => 'string|max:150'
        ];
    }
}
