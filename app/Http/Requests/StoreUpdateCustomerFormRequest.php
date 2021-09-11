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
            'cpf' => "unique:customers,cpf,{$this->segment(3)},id|min:11|max:11",
            'rg' => "unique:customers,rg,{$this->segment(3)},id|min:8|max:8",
            'cnpj' => "unique:customers,cnpj,{$this->segment(3)},id|min:14|max:14",
            'email' => "unique:customers,email,{$this->segment(3)},id|min:10|max:100|email",
            'cellphone' => "required|unique:customers,cellphone,{$this->segment(3)},id|min:9|max:9",
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
