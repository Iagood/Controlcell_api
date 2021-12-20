<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    abstract protected function getService();

    public function index()
    {
        $response = $this->getService()->getAll();

        if (isset($response['error']))
            return response()->json($response,500);
        
        return response($response,200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $response = $this->getService()->store($request->request);

        if (isset($response['error']))
            return response()->json($response,500);

        return response($response,201);
    }

    public function show(int $id)
    {
        $response = $this->getService()->findById($id);

        if (isset($response['message']) && ($response['message'] === 'Register not found!')) {
            return response()->json($response,404);
        }
        else if (isset($response['error'])) {
            return response()->json($response,500);
        }
        return response($response,200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        $response = $this->getService()->update($request->request, $id);

        if ($response['message'] === 'Register not found!') {
            return response()->json($response,404);
        }
        else if (isset($response['error'])) {
            return response()->json($response,500);
        }
        return response($response,200);
    }

    public function destroy(int $id)
    {
        $response = $this->getService()->destroy($id);

        if ($response['message'] === 'Register not found!') {
            return response()->json($response,404);
        }
        else if (isset($response['error'])) {
            return response()->json($response,500);
        }
        return response($response,200);
    }
}
