<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function scopeActive($q){
        return $q->where('is_active',1);
    }
}
