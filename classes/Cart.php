<?php

	class Cart {

		 //read session if exists

			protected $items = array();




			/*
			*
			* Constructor
			*
			*/

			public function __construct() {

				if (isset($_SESSION['cart'])) {

					$this->items = $_SESSION['cart'];

				}

			}




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
		* Display Items
		*
		*/

		public function displayItems() {

			return $this->items;

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

		    } else {

		        $this->items[$id] = array('qty' => 1);

		    }
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



		public function persist() {

			$_SESSION['cart'] = $this->items;

		}

		//display or count items?

		//emtpy cart function - destroy()

    }
?>
