<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
        'phone',
        'provinces_id',
        'cities_id',
        'alamat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function destinasi()
    {
        return $this->hasMany(AddressDestination::class, 'users_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id', 'id');
    }
    public function payment()
    {
        return $this->hasMany(Payment ::class, 'users_id', 'id');
    }
    public function detail()
    {
        return $this->hasMany(CartDetail::class, 'users_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'users_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany(PaymentDetail::class, 'users_id');
    }
    public function rekap()
    {
        return $this->hasMany(RekapJual::class, 'users_id');
    }
}
