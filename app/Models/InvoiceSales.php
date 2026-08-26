<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSales extends Model
{
    use HasFactory;

    public function sales_info()
    {
        return $this->belongsTo('App\Models\Sales', 'sale_id', 'id');
    }
}
