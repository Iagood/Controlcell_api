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

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function store($customer)
    {
        return $this->repository->store($customer->all());
    }

    public function update($request, $id)
    {
        $customer = $this->findById($id);

        if (isset(json_decode($customer)->error))
            return $customer;

        return $this->repository->update($customer, $request->all());
    }

    public function destroy($id)
    {
        $customer = $this->findById($id);

        if (isset(json_decode($customer)->error))
            return $customer;

        return $this->repository->destroy($customer);
    }
}