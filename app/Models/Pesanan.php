<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payment()
    {
        return $this->hasMany(Payment::class, 'pesanans_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($pesan)
        {
            $pesan->number = Pesanan::where('users_id', Auth::user()->id)->max('number') + 1;
            $pesan->kode_unik = 'INV'. '/' . Carbon::now()->format('Ymd') . '/' . str_pad($pesan->number, 4, '0',STR_PAD_LEFT);
        });
    }
}
