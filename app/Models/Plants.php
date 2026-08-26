<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    use HasFactory;

    public function user_info()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function plant_products()
    {
        return $this->hasMany('App\Models\PlantProducts', 'plant_id', 'id');
        // return $this->hasMany('App\Models\products', 'product_id', 'product_id');
    }
    public function Specification()
    {
        return $this->belongsTo('App\Models\specification', 'specifiction_id','id',);
        // return $this->hasMany('App\Models\products', 'product_id', 'product_id');
    }

}
