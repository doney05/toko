<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    public function productitem()
    {
        return $this->hasMany(ProductItem::class, 'product_lists_id', 'id')->with('productlist');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_lists_id', 'id');
    }
}
