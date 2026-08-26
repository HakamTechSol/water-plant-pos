<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function emp_info()
    {
        return $this->belongsTo('App\Models\employee', 'emp_id', 'id');
    }
}
