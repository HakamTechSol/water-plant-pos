<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteProducts extends Model
{
    use HasFactory;

    public function product_info()
    {
        return $this->belongsTo('App\Models\products', 'product_id', 'product_id');
    }
}
