<?php

namespace App\Cart;

use App\Models\Product;


class Item
{
    private $product;
    private $variants = [];
    private $quantity = 0;

    public function __construct(Product $product, $variants){
        try{
            $this->product = $product;
            $this->variants = $variants;
        }catch(\Exception $e){
            $this->product = null;
            $this->variants = [];
        }
    }

    public function product(){
        return $this->product;
    }

    public function variants(){
        return $this->variants;
    }


    public function amount(){
        $amount = 0;
        if($this->product->discounted_price != null){
            $amount = $this->product->discounted_price * $this->quantity;
        }else{
            $amount = $this->product->price * $this->quantity;
        }

        return $amount;
    }

    public function setQty($newQty){
        $this->quantity=$newQty;
    }

    public function getQty(){
        return $this->quantity;
    }

    public function get_item($product){
        if($this->product == $product){
            return $this;
        }
        return null;
    }

}
