<?php

namespace App\Http\Controllers\Api;

use App\Services\CustomerService;

class CustomerController extends CrudController
{
    function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    protected function getService()
    {
        return $this->customerService;
    }

    protected function getFormRequest($request, $id)
    {
        $request->validate([
            'name' => "required|unique:customers,name,{$id},id|max:150|string",
            'cpf' => "unique:customers,cpf,{$id},id|cpf",
            'rg' => "unique:customers,rg,{$id},id|digits:10|numeric",
            'cnpj' => "unique:customers,cnpj,{$id},id|cnpj",
            'email' => "unique:customers,email,{$id},id|min:10|max:100|email",
            'ddd_cellphone' => 'required|digits:2|numeric',
            'cellphone' => "required|unique:customers,cellphone,{$id},id|celular",
            'ddd_telephone' => 'digits:2|numeric',
            'telephone' => 'telefone',
            'cep' => 'required|numeric|digits:8',
            'uf' => 'required|uf',
            'public_place' => 'required|max:100|string',
            'city' => 'required|string|max:50',
            'county' => 'required|string|max:50',
            'complement' => 'string|max:50',
            'comments' => 'string|max:150'
        ]);
    }
}
