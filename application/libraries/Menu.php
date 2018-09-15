<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu implements Iterator, Countable {

    public $items = array();
    protected $position = 0;
    protected $seo_urls = array();

    //Checks if the menu is empty or not
    public function isEmpty() {
        return (empty($this->items));
    }

    //function that adds items to the menu
    public function addMenuItem(MenuItem $item) {
        // Need the item id:
        $seo_url = $item->getSeoUrl();
        // Throw an exception if there's no id:
        if (!$seo_url) throw new Exception('The menu requires items with unique SEO_URL values.');
        // Add or update:
        if (isset($this->items[$seo_url])) {
            $this->updateMenuItem($item, $this->items[$seo_url]);
        } else {
            $this->items[$seo_url] = array('item' => $item);
            $this->seo_urls[] = $seo_url;
        }
    } // End of addMenuItem() method.

    public function updateMenuItem(MenuItem $item, $status) {
        // Need the unique item id:
        $seo_url = $item->getSeoUrl();
        // Delete or update accordingly:
        if ($status === 0) {
            $this->deleteMenuItem($item);
        } else {
            $this->items[$seo_url] = $item;
        }
    } // End of updateMenuItem() method.

    public function deleteMenuItem(MenuItem $item) {
        $seo_url = $item->getSeoUrl();
        if (isset($this->items[$seo_url])) {
                unset($this->items[$seo_url]);
        }
        $index = array_search($seo_url, $this->seo_urls);
        unset($this->seo_urls[$index]);
        $this->seo_urls = array_values($this->seo_urls);
    }

    public function count() {
        return count($this->items);
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
        return (isset($this->seo_urls[$this->position]));
    }
    public function current() {
        $index = $this->seo_urls[$this->position];
        return $this->items[$index];
    } // End of current() method.

}
