<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=["Emp_FName","Emp_LName","Emp_Phone","Emp_Email","created_by"];
}
