<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
      'name',
      'description',
      'product_type',
      'category_id',
      'subcategory_id',
      'subsubcategory_id',
      'brand_id',
      'sku',
      'unit',
      'color',
      'attributes',
      'unit_price',
      'purchase_price',
      'selling_price',
      'tax',
      'tax_model',
      'discount',
      'discount_type',
      'total_quantity',
      'minimum_quantity',
      'shipping_cost',
      'featured', 
      'search_tags',
      'meta_title',
      'meta_description',
  ];


  public function images()
  {
      return $this->hasMany(Image::class);
  }

  public function category()
  {
      return $this->belongsTo(Category::class);
  }
  
  public function subcategory()
  {
      return $this->belongsTo(Subcategory::class);
  }

  public function subsubcategory()
  {
      return $this->belongsTo(Subsubcategory::class);
  }


}
