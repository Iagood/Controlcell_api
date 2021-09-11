<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\CustomerService;
use App\Http\Requests\StoreUpdateCustomerFormRequest;

class CustomerController extends Controller
{
    function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->customerService->listAll();
        
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCustomerFormRequest $request)
    {
        $response = $this->customerService->store($request->request);
        
        if (isset(json_decode($response)->error)) {
            return response()->json($response,500);
        }
        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $response = $this->customerService->update($request->request, $id);

        if (json_decode($response)->message === null) {
            return response()->json(['error'=>true, 'message' =>'Register not found!'],404);
        }
        else if (isset(json_decode($response)->error)) {
            return response()->json($response,500);
        }
        return response()->json($response,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->customerService->destroy($id);

        if (json_decode($response)->message === null) {
            return response()->json(['error'=>true, 'message' =>'Register not found!'],404);
        }
        else if (isset(json_decode($response)->error)) {
            return response()->json($response,500);
        }
        return response()->json($response,201);
    }
}
