<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_NOT_PAID = 1;
    const STATUS_PAID = 2;
    const STATUS_SHIPPING = 3;
    const STATUS_DONE = 4;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_city',
        'id_payment_type',
        'name',
        'address',
        'phone',
        'zip',
        'note',
        'total',
        'status',
    ];

    public function productsOrders()
    {
        return $this->hasMany(ProductOrder::class, 'id_order', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'id_city', 'id');
    }

    public function paymentType() {
        return $this->belongsTo(PaymentType::class, 'id_payment_type', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
