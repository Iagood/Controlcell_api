<?php

namespace App\Repository\Core;

use App\Models\Product;
use App\Repository\Core\BaseRepository;
use App\Repository\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements  ProductRepositoryInterface
{
    public function entity()
    {
        return Product::class;
    }
}