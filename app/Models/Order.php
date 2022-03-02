<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetail','order_id');
    }

    public function shipping(){
        return $this->hasOne('App\Models\Shipping','order_id');
    }

    public function billing(){
        return $this->hasOne('App\Models\Billing','order_id');
    }
}
