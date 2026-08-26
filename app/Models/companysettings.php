<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companysettings extends Model
{
    use HasFactory;
    protected $fillable=["Name","NTN","Email","Phone","Whatsapp","Website","Facebook","Insta","Address", "type"];
}
