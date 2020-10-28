<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scopeActive($q){
        return $q->where('is_active','=',1);
    }

    public function scopeFeatured($q){
        return $q->where('is_featured','=',1);
    }

    public function subcategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id');
    }
    public function images(){
        return $this->morphToMany(Image::class,'imageable');
    }
}
