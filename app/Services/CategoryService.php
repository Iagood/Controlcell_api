<?php

namespace App\Services;

use App\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listAll()
    {
        return $this->categoryRepository->listAll();
    }

    public function getById(int $id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function store(object $category)
    {
        return $this->categoryRepository->store($category->all());
    }

    public function update(object $request, $id)
    {
        $category = $this->getById($id);

        if (isset(json_decode($category)->error))
            return $category;

        return $this->categoryRepository->update($request->all(), $category);
    }

    public function destroy(int $id)
    {
        $category = $this->getById($id);

        if (isset(json_decode($category)->error))
            return $category;

        return $this->categoryRepository->destroy($category);
    }

}