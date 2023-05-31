<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'carts_id', 'id');
    }
    public function getWeight()
    {
        return $this->cart()->item()->weight;
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'carts_id', 'id');
    }
}
