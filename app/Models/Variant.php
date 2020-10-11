<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    public function variantable(){
        return $this->morphTO();
    }
    public function varianttype(){
        return $this->belongsTo(VariantType::class,'variant_type_id');
    }
}
