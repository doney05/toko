<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function list()
    {
        return $this->hasMany(ProductList::class, 'products_id', 'id');
    }
    public function item()
    {
        return $this->hasMany(ProductItem::class, 'products_id', 'id');
    }
}
