<?php

namespace App\Repository\Api;

use App\Models\Customer;

class CustomerRepository
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function listAll()
    {
        try {
            $response = $this->customer->get();
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }
}
