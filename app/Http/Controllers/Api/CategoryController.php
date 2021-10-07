<?php

namespace App\Http\Controllers\Api;

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

    protected function getFormRequest($request, $id)
    {
        $request->validate([
            'name' => "required|unique:categories,name,{$id},id|max:100|string"
        ]);
    }
}
