<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
