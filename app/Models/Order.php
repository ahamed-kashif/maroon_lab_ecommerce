<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'variants' => 'array'
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id')
                    ->withPivot('quantity');
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
