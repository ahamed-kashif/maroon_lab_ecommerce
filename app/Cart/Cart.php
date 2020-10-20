<?php

namespace App\Cart;

use App\Cart\Item;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Annotation\Route;


class Cart
{
    private $items = [];
    public $order_note = "";

    public function _construct(){

    }

    /**
     * get items array of this cart.
     *
     * @return array
     */
    public function items(){
        return $this->items;
    }

    /**
     * add product as item in this cart.
     *
     * @param Item $item
     * @param int $quantity
     *
     * @return boolean
     */
    public function add_item(Item $item, $quantity)
    {
        try{
            foreach ($this->items as $i){
                if($i->product()->id == $item->product()->id){
                    return false;
                }
            }
            $item->setQty($quantity);
            array_push($this->items, $item);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * update quantity of specified item.
     *
     * @param Item $item
     * @param int $qty
     *
     * @return boolean
     */
    public function update_item(Item $item, $qty){
        if(in_array($item, $this->items)){
            $key = array_search($item,$this->items);
            //setting quantity
            $this->items[$key]->setQty($qty);
            //re-calculating amount
            $this->items[$key]->amount();
            return true;
        }
        return false;
    }

    /**
     * remove specified item from this cart.
     *
     * @param Item $item
     * @return boolean
     */
    public function remove_item(Item $item){
        if(in_array($item, $this->items)){
            $key = array_search($item,$this->items);
            //removing item
            unset($this->items[$key]);
            //indexing items array
            $this->items = array_values($this->items);
            return true;
        }
        return false;
    }

    /**
     * get total amount of this cart without sale.
     *
     * @return float
     */
    public function total(){
        $total = 0;
        foreach($this->items as $item){
            $total = $total + $item->total();
        }
        return $total;
    }
    /**
     * get total amount of this cart with sale.
     *
     * @return float
     */
    public function bill(){
        $bill =0;
        foreach ($this->items as $item){
            $bill = $bill + $item->amount();
        }
        return $bill;
    }

    /**
     * get discounted amount of this cart.
     *
     * @return float
     */
    public function discount(){
        return $this->total() - $this->bill();
    }
}
