<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductImage;
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'price_art_paper',
        'description',
        'brief_description',
        'price_art_cartoon',
        'price_art_paper',
        'price_hvs',
        'price_doft',
        'price_glossy',
        'cutting_price',
        // 'stock',
        'price',
    ];

    // MANY TO ONE
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}