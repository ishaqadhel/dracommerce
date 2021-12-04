<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product',
        'id_order',
        'quantity',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
