<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesproduct extends Model
{
    use HasFactory;
    protected $fillable = ['saleid', 'price', 'quantity', 'product_id'];

    public function product_info()
    {
        return $this->belongsTo('App\Models\products', 'product_id', 'product_id');
    }
}
