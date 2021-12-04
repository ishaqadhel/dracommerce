<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

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
