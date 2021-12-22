<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Services\ProductService;

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

    protected function beforeStore(StoreUpdateProductFormRequest $request)
    {
        $request->validated();
        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateProductFormRequest $request, $id)
    {
        $request->validated();
        return $this->update($request, $id);
    }
}
