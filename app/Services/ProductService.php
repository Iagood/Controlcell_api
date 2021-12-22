<?php

namespace App\Services;

use App\Repository\Contracts\ProductRepositoryInterface;

class ProductService
{
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function paginate($totalPage)
    {
        return $this->repository->paginate($totalPage);
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function store(object $product)
    {
        return $this->repository->store($product->all());
    }

    public function update(object $request, int $id)
    {
        $product = $this->findById($id);

        if (isset($product['error']))
            return $product;

        return $this->repository->update($product, $request->all());
    }

    public function destroy(int $id)
    {
        $product = $this->findById($id);

        if (isset($product['error']))
            return $product;

        return $this->repository->destroy($product);
    }
}