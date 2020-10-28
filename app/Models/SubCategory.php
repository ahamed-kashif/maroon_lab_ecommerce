<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($q){
        return $q->where('is_active','=',1);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
