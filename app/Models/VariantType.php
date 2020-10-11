<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantType extends Model
{
    public function variants(){
        return $this->hasMany(Variant::class);
    }
}
