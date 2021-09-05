<?php

namespace App\Services\Api;

use App\Repository\Api\CustomerRepository;

class CustomerService
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function listAll()
    {
        return $this->customerRepository->listAll();
    }

    public function store($customer)
    {
        return $this->customerRepository->store($customer->all());
    }

    public function update($request, $id)
    {
        $customer = $this->getById($id);

        if (!$customer) {
            return json_encode(['error' => true, 'message' => null]);
        }
        else if (isset(json_decode($customer)->error)) {
            return $customer;
        }

        return $this->customerRepository->update($request->all(), $customer);
    }

    public function getById($id)
    {
        return $this->customerRepository->getById($id);
    }

}