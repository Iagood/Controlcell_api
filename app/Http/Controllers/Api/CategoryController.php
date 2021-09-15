<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\CategoryService;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{
    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->categoryService->listAll();

        if (isset(json_decode($response)->error))
            return response($response,500);
        
        return response($response,500);
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
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $response = $this->categoryService->store($request->request);

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
    public function show($id)
    {
        $response = $this->categoryService->getById($id);

        if (isset(json_decode($response)->message) && json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,201);
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
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $response = $this->categoryService->update($request->request, $id);

        if (json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->categoryService->destroy($id);

        if (json_decode($response)->message === 'Register not found!') {
            return response($response,404);
        }
        else if (isset(json_decode($response)->error)) {
            return response($response,500);
        }
        return response($response,201);
    }
}
