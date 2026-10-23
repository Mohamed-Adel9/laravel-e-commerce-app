<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    protected $fillable = [
        'brand_id',
        'category_id',
        'name',
        'slug',
        'regular_price',
        'sale_price',
        'sku',
        'stock_quantity',
        'stock_status',
        'featured',
        'short_description',
        'description',
        'status',
        'thumbnail',
        'created_by',
    ];

   public function brand(){
    return $this->belongsTo(Brand::class,'brand_id');
   }

    public function category(){
    return $this->belongsTo(Category::class,'category_id');
   }
    
   public function creator (){
    return $this->belongsTo(User::class ,'created_by');
   }

   public function images(){
    return $this->hasMany(ProductImage::class, "product_id");
   }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}
