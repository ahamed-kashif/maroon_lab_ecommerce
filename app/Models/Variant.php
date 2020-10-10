<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    public function VariantItems(){
        return $this->morphToMany('App\Models\', 'taggable');
    }
}
