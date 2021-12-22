<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Services\CategoryService;

class CategoryController extends CrudController
{
    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    protected function getService()
    {
        return $this->categoryService;
    }

    protected function beforeStore(StoreUpdateCategoryFormRequest $request)
    {
        $request->validated();
        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateCategoryFormRequest $request, $id)
    {
        $request->validated();
        return $this->update($request, $id);
    }

}
