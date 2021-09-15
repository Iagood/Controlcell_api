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
    }

}
