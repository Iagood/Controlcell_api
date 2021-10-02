<?php

namespace App\Repository\Api;

use App\Models\Category;

class CategoryRepository
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function listAll()
    {
        try {
            $response = $this->category->get();
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function getById($id)
    {
        try {
            $response = $this->category->find($id);
            if(!$response) 
                $response = json_encode(['error' => true, 'message' => 'Register not found!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function store($category)
    {
        try {
            $this->category->firstOrCreate($category);
            $response = json_encode(['success' => true, 'message' => 'Record entered successfully!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function update($request, $category)
    {
        try {
            $category->update($request);
            $response = json_encode(['success' => true, 'message' => 'Record updated successfully!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

    public function destroy($category)
    {
        try {
            $category->delete();
            $response = json_encode(['success' => true, 'message' => 'Record deleted successfully!']);
        } catch (\Exception $exception) {
            $response = json_encode(['error' => true, 'message' => $exception->getMessage()]);
        }
        return $response;
    }

}
