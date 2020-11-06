<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status'];
    protected $casts = [
        'variants' => 'array'
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id')
                    ->withPivot('quantity','variants','price','discounted_price');
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function order_tracking(){
        return $this->belongsTo(OrderTracking::class,'order_tracking_id','id');
    }
    public function getVariantsAttribute($value)
    {
        return json_decode($this->pivot->variants, true);
    }
}
