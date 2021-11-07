<?php

namespace App\Services;

use App\Repository\Contracts\CategoryRepositoryInterface;

class CategoryService
{
    private $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function store(object $category)
    {
        return $this->repository->store($category->all());
    }

    public function update(object $request, $id)
    {
        $category = $this->getById($id);

        if (isset($category['error']))
            return $category;

        return $this->repository->update($request->all(), $category);
    }

    public function destroy(int $id)
    {
        $category = $this->getById($id);

        if (isset($category['error']))
            return $category;

        return $this->repository->destroy($category);
    }

}