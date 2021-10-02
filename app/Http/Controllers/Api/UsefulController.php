<?php

namespace App\Http\Controllers\Api;

abstract class UsefulController extends Controller
{
    abstract protected function getService();

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
