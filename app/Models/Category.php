<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  'slug', 'icon', 'position', 'home_status', 'priority'  
    ];

    public function subcategories()
    {
    return $this->hasMany(Subcategory::class);
    }

    public function subsubcategories()
    {
    return $this->hasMany(subsubcategories::class);
    }

    public function products()
    {
    return $this->hasMany(Product::class);
    }
}
