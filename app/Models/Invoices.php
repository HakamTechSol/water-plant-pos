<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    public function user_info(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function customer_info(){
        return $this->belongsTo('App\Models\customer', 'customer_id', 'id');
    }

}
