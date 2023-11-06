<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',  'banner_type', 'banner_title', 'url', 'bg_color','discount','status','btn_text'
    ];
}
