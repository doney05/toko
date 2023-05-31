<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function citi()
    {
        return $this->hasMany(City::class, 'provinces_id', 'id');
    }
    public function address()
    {
        return $this->hasMany(Address::class, 'provinces_id', 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'provinces_id', 'id');
    }
}
