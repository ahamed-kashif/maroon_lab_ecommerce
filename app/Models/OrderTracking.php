<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    protected $fillable = ['status','processing_started_at','shipping_started_at','delivered_at'];
    public function shipping_method(){
        return $this->belongsTo(ShippingMethod::class,'shipping_method_id','id');
    }
}
