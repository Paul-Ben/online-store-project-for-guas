<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_id', 'product_category', 'product_price', 'product_stock', 'product_image',
    'featured_product', 'recommended_product', 'on_sale', 'sale_price', 'description'];
}
