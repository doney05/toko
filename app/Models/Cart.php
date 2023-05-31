<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(ProductItem::class, 'product_items_id', 'id');
    }
    public function listitem()
    {
        return $this->belongsTo(ProductList::class, 'product_lists_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function detail()
    {
        return $this->hasMany(CartDetail::class, 'carts_id', 'id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'carts_id', 'id');
    }
}
