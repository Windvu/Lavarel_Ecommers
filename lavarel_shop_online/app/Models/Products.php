<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'compare_price',
        'category_id',
        'brand_id',
        'sub_category_id',
        'is_featured',
        'sku',
        'barcode',
        'track_qty',
        'qty',
        'status'
    ];
    // A product has many images
    public function productImages()
    { 
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    use HasFactory;
}
