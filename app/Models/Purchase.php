<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function supp_info()
    {
        return $this->belongsTo('App\Models\supplier', 'supplier_id', 'id');
    }

    public function user_info()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function acc_info()
    {
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }

    public function product_info()
    {
        return $this->belongsTo('App\Models\products', 'product_id', 'product_id');
    }

}
