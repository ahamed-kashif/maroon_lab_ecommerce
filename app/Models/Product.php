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
    public function variants(){
        return $this->morphToMany(Variant::class,'variantable', 'variantables');
    }
    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    public function is_sale(){
        if($this->discounted_price != null){
            return true;
        }
        return false;
    }
    public function scopeRelated_products(){
        return $this->active()->whereHas('categories', function($q){
            $q->whereIn('categories.id',$this->categories->pluck('id')->toArray());
        })->where('id','!=',$this->id);
    }
}
