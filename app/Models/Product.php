<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function productImage(){
        return $this->hasMany('App\Models\ProductImage');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','created_by');
    }
}
