<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    const STATUS_ACTIVE = 1;
    const STATUS_SUSPENDED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_city',
        'name',
        'address',
        'phone',
        'zip',
        'status',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user', 'id');
    }

    public function productsReviews()
    {
        return $this->hasMany(ProductReview::class, 'id_user', 'id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id_user', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'id_city', 'id');
    }

}
