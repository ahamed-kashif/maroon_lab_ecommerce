<?php

namespace App\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Redirect;


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
    public function variants(){
        return $this->variants;
    }

    /**
     * return total payable amount.
     *
     * @return float
     */
    public function amount(){
        $amount = 0;
        if($this->product->discounted_price != null){
            $amount = $this->product->discounted_price * $this->quantity;
        }else{
            $amount = $this->product->price * $this->quantity;
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
        $total = $this->product->price * $this->quantity;

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
