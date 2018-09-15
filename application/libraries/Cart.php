<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart implements Iterator, Countable {

    public $items = array();
    protected $position = 0;
    protected $ids = array();

    //Checks if the Cart is empty or not
    public function isEmpty() {
        return (empty($this->items));
    }

    //function that adds items to the cart via ajax calls
    public function addItem(Item $item) {
        // Need the item id:
        $id = $item->getId();
        // Throw an exception if there's no id:
        if (!$id) throw new Exception('The cart requires items with unique ID values.');
        // Add or update:
        if (isset($this->items[$id])) {
            $this->updateItem($item, $this->items[$id]['qty'] + 1);
        } else {
            $this->items[$id] = array('item' => $item, 'qty' => 1);
            $this->ids[] = $id;
        }
    }

    public function removeItemQty(Item $item) {
        // Need the item id:
        $id = $item->getId();
        // Throw an exception if there's no id:
        if (!$id) throw new Exception('The cart requires items with unique ID values.');
        // Add or update:
        if (isset($this->items[$id])) {
            if ($this->items[$id]['qty'] > 1) {
                $this->updateItem($item, $this->items[$id]['qty'] - 1);
            }else{
                $this->deleteItem($id);
            }
            
        }
    }

    public function getItems(){
        return $this->items;
    }

    public function getItem($id){
        if(array_key_exists($id, $this->items[$id])) return $this->items['item'][$id];
    }
    public function delItemFromCart($id){
        $this->deleteItem($id);
    }

    public function updateItem(Item $item, $qty) {
        // Need the unique item id:
        $id = $item->getId();
        // Delete or update accordingly:
        if ($qty === 0) {
            $this->deleteItem($item);
        } elseif ( ($qty > 0) && ($qty != $this->items[$id]['qty'])) {
            $this->items[$id]['qty'] = $qty;
        }
    } // End of updateItem() method.

    public function deleteItem($id) {
        if (isset($this->items[$id])) {
                unset($this->items[$id]);
        }
        $index = array_search($id, $this->ids);
        unset($this->ids[$index]);
        $this->ids = array_values($this->ids);
    }
    public function getQuantity(){
        $quantity = 0;
        foreach ($this->items as $value) {
            $quantity += $value['qty'];
        }
        return $quantity;
    }
    public function count() {
        //if($this->isEmpty()) return 0;
        return count($this->items);
    }
    public function getTotalPrice(){
        $total = 0;
        foreach ($this->items as $key => $value) {
            $total += $this->items[$key]['item']->getPrice() * $this->items[$key]['qty'];
        }
        return $total;
    }
    public function key() {
        return $this->position;
    }
    public function next() {
        $this->position++;
    }
    public function rewind() {
        $this->position = 0;
    }
    public function valid() {
        return (isset($this->ids[$this->position]));
    }
    public function current() {
        $index = $this->ids[$this->position];
        return $this->items[$index];
    } // End of current() method.

}
