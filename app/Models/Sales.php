<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    public function acc_info()
    {
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }

    public function customer_info()
    {
        return $this->belongsTo('App\Models\customer', 'customer_id', 'id');
    }

    public function user_info(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function sale_products()
    {
        return $this->belongsTo('App\Models\salesproduct', 'id', 'saleid');
    }
}
