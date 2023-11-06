<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchesDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'purches_id',
        'product_id',  
        'Quantity',
    ];

    public function purches(){
        return $this->belongsTo(Purches::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
