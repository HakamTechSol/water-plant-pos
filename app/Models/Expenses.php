<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    public function user_info()
    {

        return $this->belongsTo('App\Models\User', 'user_id', 'id');

    }

    public function acc_info()
    {

        return $this->belongsTo('App\Models\Account', 'account_id', 'id');

    }

    public function emp_info()
    {
        return $this->belongsTo('App\Models\employee', 'emp_id', 'id');
    }

}