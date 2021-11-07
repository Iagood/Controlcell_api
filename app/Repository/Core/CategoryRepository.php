<?php

namespace App\Repository\Core;

use App\Models\Category;
use App\Repository\Core\BaseRepository;
use App\Repository\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function entity()
    {
        return Category::class;
    }
}
