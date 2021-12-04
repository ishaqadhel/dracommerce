<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product_category',
        'name',
        'description',
        'stock',
        'price',
        'image',
    ];

    public function productsCarts()
    {
        return $this->hasMany(ProductCart::class, 'id_product', 'id');
    }

    public function productsReviews()
    {
        return $this->hasMany(ProductReview::class, 'id_product', 'id');
    }

    public function productsOrders()
    {
        return $this->hasMany(ProductOrder::class, 'id_product', 'id');
    }

    public function productCategory() {
        return $this->belongsTo(ProductCategory::class, 'id_product_category', 'id');
    }
}
