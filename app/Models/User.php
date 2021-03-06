<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_OK = 'OK';
    const STATUS_BANNED = 'BANNED';
    const ALL_STATUSES = [
        self::STATUS_OK,
        self::STATUS_BANNED,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rates()
    {
        return $this->belongsToMany(Product::class, 'product_rates')->withPivot('rate')->withTimestamps();
    }

    public function activationCode()
    {
        return $this->hasOne(ActivationCode::class);
    }

    public function wishList()
    {
        return $this->belongsToMany(Product::class, 'wishlist');
    }

    public function getIsActiveAttribute()
    {
        return $this->activated_at != null;
    }
}
