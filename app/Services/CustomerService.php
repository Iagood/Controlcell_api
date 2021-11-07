<?php

namespace App\Services;

use App\Repository\Contracts\CustomerRepositoryInterface;

class CustomerService
{
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository)
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

    public function store(object $customer)
    {
        return $this->repository->store($customer->all());
    }

    public function update(object $request, int $id)
    {
        $customer = $this->findById($id);

        if (isset($customer['error']))
            return $customer;

        return $this->repository->update($customer, $request->all());
    }

    public function destroy(int $id)
    {
        $customer = $this->findById($id);

        if (isset($customer['error']))
            return $customer;

        return $this->repository->destroy($customer);
    }
}