<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class ProductController extends CrudController
{
    function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    protected function getService()
    {
        return $this->productService;
    }

    protected function getFormRequest($request, $id)
    {

    }
}
