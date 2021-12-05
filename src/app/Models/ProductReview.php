<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product',
        'id_user',
        'rating',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
