<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\FileController as ApiFileController;
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
        $this->verifyImage($request);

        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateProductFormRequest $request, $id)
    {
        $request->validated();
        return $this->update($request, $id);
    }

    protected function verifyImage(object $request)
    {
        $image = new ApiFileController;
        if ($image->validateImage($request)) 
            return $image->renameImage($request);

        return false;
    }
}
