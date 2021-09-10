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

    public function getById($id)
    {
        try {
            $response = $this->customer->find($id);
            if(!$response) {
                $response = json_encode(['error' => true, 'message' => null]);
            }
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function store($customer)
    {
        try {
            $this->customer->firstOrCreate($customer);
            $response = json_encode(['success' => true, 'message' => 'Record entered successfully!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function update($request, $customer)
    {
        try {
            $customer->update($request);
            $response = json_encode(['success' => true, 'message' => 'Record updated successfully!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }
}
