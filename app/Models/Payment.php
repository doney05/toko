<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function item()
    {
        return $this->belongsTo(ProductItem::class, 'product_items_id');
    }
    public function cartdetail()
    {
        return $this->belongsTo(CartDetail::class, 'cart_details_id', 'id');
    }
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanans_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'payments_id');
    }
}
