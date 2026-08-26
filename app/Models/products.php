<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'cate_id', 'size_id','brand_id','product_unit','product_SKU','product_qty','product_desc','product_price','product_img','created_by'];

    public function brand_info()
    {
        return $this->belongsTo('App\Models\brands', 'brand_id', 'brand_id');
    }

    public function size_info()
    {
        return $this->belongsTo('App\Models\size', 'size_id', 'size_id');
    }
}
