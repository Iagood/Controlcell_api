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

}