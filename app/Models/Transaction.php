<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function payment_method(){
        $this->belongsTo(PaymentMethod::class);
    }
}
