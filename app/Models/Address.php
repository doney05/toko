<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id', 'id');
    }
}
