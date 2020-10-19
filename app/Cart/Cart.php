<?php

namespace App\Cart;

use App\Cart\Item;


class Cart
{
    private $items = [];
    private $bill = 0;

    public function _construct(){

    }

    public function items(){
        return $this->items;
    }

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

    public function remove_item(Item $item){
        if(in_array($item, $this->items)){
            $key = array_search($item,$this->items);
            //removing item
            unset($this->items[$key]);
            //indexing items array
            $this->items = array_values($this->item);
            return true;
        }
        return false;
    }

    public function bill(){
        $this->bill = 0;
        foreach ($this->items as $item){
            $this->bill = $this->bill + $item->amount();
        }
        return $this->bill;
    }
}
