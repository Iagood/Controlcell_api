<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateCustomerFormRequest;
use App\Services\Api\CustomerService;

class CustomerController extends UsefulController
{
    function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    protected function getService()
    {
        return $this->customerService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCustomerFormRequest $request)
    {
        $response = $this->getService()->store($request->request);

        if (isset(json_decode($response)->error))
            return response($response,500);

        return response($response,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCustomerFormRequest $request, $id)
    {
        $response = $this->getService()->update($request->request, $id);

        if (json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,200);
    }
}
