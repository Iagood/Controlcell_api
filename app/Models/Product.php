<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'description',
        'product_cost',
        'sale_price',
        'guarantee_months',
        'observation',
        'commission',
        'image',
        'minimum_inventory',
        'current_inventory'
    ];
}