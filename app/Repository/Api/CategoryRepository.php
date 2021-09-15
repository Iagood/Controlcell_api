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

}
