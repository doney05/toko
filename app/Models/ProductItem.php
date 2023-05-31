<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    public function productlist()
    {
        return $this->belongsTo(ProductList::class, 'product_lists_id', 'id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_items_id', 'id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class. 'product_items_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'product_items_id');
    }
}
