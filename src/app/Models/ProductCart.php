<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product',
        'id_cart',
        'quantity',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class, 'id_cart', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
