<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateCustomerFormRequest;
use App\Services\CustomerService;

class CustomerController extends CrudController
{
    function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    protected function getService()
    {
        return $this->customerService;
    }

    protected function beforeStore(StoreUpdateCustomerFormRequest $request)
    {
        $request->validated();
        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateCustomerFormRequest $request, $id)
    {
        $request->validated();
        return $this->update($request, $id);
    }
}
