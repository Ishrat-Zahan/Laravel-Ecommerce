<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'details',
        'price',
        'image',
        'quantity',
        'discount',
        'active',
        'status',
        'featured',

    ];

    public function category(){
       return $this->belongsTo(Category::class);
    }
    public function subcategory(){
       return $this->belongsTo(Subcategory::class);
    }


}
