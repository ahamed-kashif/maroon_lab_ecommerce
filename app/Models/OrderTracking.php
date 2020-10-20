<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    public function shipping_method(){
        return $this->belongsTo(ShippingMethod::class,'shipping_method_id','id');
    }
}
