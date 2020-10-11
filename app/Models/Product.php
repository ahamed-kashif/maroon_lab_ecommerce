<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Image;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class,'product_category','product_id','category_id');
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function images(){
        return $this->morphToMany(Image::class,'imageable');
    }
    public function variantItems(){
        return $this->morphToMany(Variant::class,'variantable');
    }
}
