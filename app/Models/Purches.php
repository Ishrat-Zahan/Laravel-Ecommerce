<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purches extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'total'
    ];

    public function supplieres(){
        return $this->belongsTo(Supplier::class);
    }
    public function purchesdetails(){
        return $this->hasMany(PurchesDetails::class);
    }
}
      