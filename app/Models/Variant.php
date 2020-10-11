<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    public function variantable(){
        return $this->morphTO();
    }
}
