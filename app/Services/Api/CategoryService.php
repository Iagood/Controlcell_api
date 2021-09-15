<?php

namespace App\Services\Api;

use App\Repository\Api\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listAll()
    {
        return $this->categoryRepository->listAll();
    }

}