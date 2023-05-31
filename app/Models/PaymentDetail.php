<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function item()
    {
        return $this->belongsTo(ProductItem::class, 'product_items_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id');
    }
}
