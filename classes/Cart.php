<?php

namespace SimplePeacock;

/*
 * Cart.php
 * Our cart class. The workhorse of our shopping cart.
 *
 */

class Cart {

    protected $items = array();


    /*
     *
     * Constructor
     * Load cart items from session data if it exists
     *
     */

    public function __construct() {

        if (isset($_SESSION['cart'])) {

            $this->items = $_SESSION['cart'];

        }

    }



    /*
     *
     * Return the items in our shopping cart
     *
     */

    public function getItems() {

        return $this->items;

    }



    /*
     *
     * Count the items in our shopping cart
     *
     */

    public function countItems() {

        $count = 0;

        foreach ($this->items as $item) {

            $count = $count + $item['qty'];
        }

        return $count;

    }



    /*
     *
     * Add an item to the shopping cart
     *
     */

    public function addItem($id) {

        // Throw an exception if there's no id:
        if (!$id) throw new Exception('The cart requires items with unique ID values.');

        // Add or update:
        if (isset($this->items[$id])) {

            $this->updateItem($id, $this->items[$id]['qty'] + 1);
            $this->persist();

        } else {

            $this->items[$id] = array('qty' => 1);
            $this->persist();

        }
    }



    /*
     *
     * Save our items in session
     *
     */

    private function persist() {

        $_SESSION['cart'] = $this->items;

    }



    /*
     *
     * Empty our shopping cart
     *
     */

    public function destroy() {

        $this->items = array();

        // remove all session variables
        session_unset();

    }



    /*
     *
     * Delete an item from the shopping cart
     *
     */

    public function removeItem($id) {

        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        $this->persist();
    }



    /*
     *
     * Update an existing item in the shopping cart
     *
     */

    public function updateItem($id, $qty) {

        // Delete or update accordingly:
        if ($qty === 0) {

            $this->deleteItem($item);

        } elseif ( ($qty > 0) && ($qty != $this->items[$id]['qty'])) {

            $this->items[$id]['qty'] = $qty;
        }
    } // End of updateItem() method.

}

