<?php

	class Cart {

		//constructor
		//read session if exists

    	protected $items = array();

    	/*
    	 *
    	 * Determine if shopping cart is empty
    	 *
    	 */
    
	    public function isEmpty() {

	    	return (empty($this->items));

		}



    	/*
    	 *
    	 * Add an item to the shopping cart
    	 *
    	 */

		//can we just pass in the $id?
		public function addItem(Item $item) {
		    
		    // Need the item id:
		    $id = $item->getId();
		    
		    // Throw an exception if there's no id:
		    if (!$id) throw new Exception('The cart requires items with unique ID values.');
		    
		    // Add or update:
		    if (isset($this->items[$id])) {

		        $this->updateItem($item, $this->items[$item]['qty'] + 1);

		    } else {

		        $this->items[$id] = array('item' => $item, 'qty' => 1);

		    }
		}



		/*
    	 *
    	 * Update an existing item in the shopping cart
    	 *
    	 */ 

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



    	/*
    	 *
    	 * Delete an item from the shopping cart
    	 *
    	 */

		public function deleteItem(Item $item) {
		    $id = $item->getId();
		    if (isset($this->items[$id])) {
		            unset($this->items[$id]);
		    }
		}




		//persist to session function?

		//display or count items?

		//emtpy cart function - destroy()

    }
?>