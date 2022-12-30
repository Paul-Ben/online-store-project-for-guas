<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_phone', 'customer_address', 'customer_id', 'product_name', 
    'product_category', 'product_id', 'product_price', 'product_quantity',];
}
