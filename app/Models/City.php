<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }
    public function address()
    {
        return $this->hasMany(Address::class, 'cities_id', 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'cities_id', 'id');
    }
}
