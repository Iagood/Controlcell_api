<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    abstract protected function getService();

    abstract protected function getFormRequest(object $request, $id);

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->getService()->listAll();

        if (isset(json_decode($response)->error))
            return response($response,500);
        
        return response($response,200);
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
    public function store(Request $request)
    {
        $this->getFormRequest($request, $id = null);
        $response = $this->getService()->store($request->request);

        if (isset(json_decode($response)->error))
            return response($response,500);

        return response($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $response = $this->getService()->getById($id);

        if (isset(json_decode($response)->message) && json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,200);
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
    public function update(Request $request, int $id)
    {
        $this->getFormRequest($request, $id);
        $response = $this->getService()->update($request->request, $id);

        if (json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->getService()->destroy($id);

        if (json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,200);
    }
}
