<?php

namespace App\Cart;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Facades\Redirect;


class Item
{
    private $product;
    private $variant = null;
    private $quantity = 0;
    private $price = 0;
    private $discountedPrice = 0;

    public function __construct(Product $product, Variant $variant){
        try{
            $this->product = $product;
            $this->variant = $variant;
        }catch(\Exception $e){
            $this->product = null;
            $this->variant = null;
        }
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setDiscountedPrice($dPrice){
        $this->discountedPrice = $dPrice;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getDiscountedPrice(){
        return $this->discountedPrice;
    }

    /**
     * returns product of item.
     *
     * @return Product
     */
    public function product(){
        return $this->product;
    }

    /**
     * returns variants of this item
     *
     * @return array
     */
    public function variant(){
        return $this->variant;
    }

    /**
     * return total payable amount.
     *
     * @return float
     */
    public function amount(){
        $amount = 0;
        if($this->discountedPrice != 0){
            $amount = $this->discountedPrice * $this->quantity;
        }else{
            $amount = $this->price * $this->quantity;
        }

        return $amount;
    }

    /**
     * returns total amount without discount.
     *
     * @return float
     */
    public function total(){
        $total = 0;
        $total = $this->price * $this->quantity;

        return $total;
    }

    /**
     * set quantity of this item
     *
     * @param int $newQty
     * @return void
     */
    public function setQty($newQty){
        $this->quantity=$newQty;
    }

    /**
     * get quantity of this item.
     *
     * @return integer
     */
    public function getQty(){
        return $this->quantity;
    }

    /**
     * get item by passing a product.
     *
     * @param Product $product
     * @return Item
     */
    public function get_item($product){
        if($this->product == $product){
            return $this;
        }
        return null;
    }

}
