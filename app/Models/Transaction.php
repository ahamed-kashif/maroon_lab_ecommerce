<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['status'];
    public function payment_method(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id','id');
    }
}
