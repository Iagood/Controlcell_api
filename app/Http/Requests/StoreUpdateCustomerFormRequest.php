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
            'name' => "required|unique:customers,name,{$this->segment(3)},id|max:150|string",
            'cpf' => "unique:customers,cpf,{$this->segment(3)},id|cpf",
            'rg' => "unique:customers,rg,{$this->segment(3)},id|digits:10|numeric",
            'cnpj' => "unique:customers,cnpj,{$this->segment(3)},id|cnpj",
            'email' => "unique:customers,email,{$this->segment(3)},id|min:10|max:100|email",
            'ddd_cellphone' => 'required|digits:2|numeric',
            'cellphone' => "required|unique:customers,cellphone,{$this->segment(3)},id|celular",
            'ddd_telephone' => 'digits:2|numeric',
            'telephone' => 'telefone',
            'cep' => 'required|numeric|digits:8',
            'uf' => 'required|uf',
            'public_place' => 'required|max:100|string',
            'city' => 'required|string|max:50',
            'county' => 'required|string|max:50',
            'complement' => 'string|max:50',
            'comments' => 'string|max:150'
        ];
    }
}
