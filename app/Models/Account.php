<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function user_info()
    {

        return $this->belongsTo('App\Models\User', 'admin_id', 'id');

    }
}
