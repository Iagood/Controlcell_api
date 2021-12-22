<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
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
            'name' => "required|unique:products,name,{$this->segment(3)},id|max:150|string",
            'code' => "required|unique:products,code,{$this->segment(3)},id|max:100|string",
            'category_id' => "required|exists:categories,id",
            'description' => "required|max:150|string",
            'product_cost' => "required|between:0,99.99|numeric",
            'sale_price' => "required|numeric|between:0,99.99",
            'guarantee_months' => 'required|digits:2|numeric',
            'observation' => 'string|max:150',
            'commission' => 'required|numeric',
            'image' => 'string',
            'minimum_inventory' => 'required|numeric',
            'current_inventory' => 'required|numeric'
        ];
    }
}
