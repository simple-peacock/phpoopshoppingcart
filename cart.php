<?php

   /*
    * cart.php
    * This page displays the contents of our shopping cart.
    *
    */
	
	$page = "cart";
  	include('header.php');

   /*
    *
    * Error Reporting (remove this later in production)
    *
    */

    error_reporting(E_ALL);
    ini_set('display_errors', 1);



   /*
    *
    * Include Files
    *
    */

    require_once 'config.php';
    require_once 'classes/Cart.php';
    require_once 'classes/DB.php';

?>
  <div>
    <h1>Cart Contents</h1>

    <?php

      if(isset($_SESSION['cart'])) {


		
		$db = DB::getInstance();
		
		$cart = new Cart();
		
		$cartItems = $cart->displayItems();
		
		$totalPrice = 0;
		
		foreach(array_keys($cartItems) as $itemID) {
		
			$itemQty = $cartItems[$itemID]['qty'];
			$itemName = $db->action('SELECT name', 'products', array('id', '=', $itemID))->first()->name;
			$itemPrice = $db->action('SELECT price', 'products', array('id', '=', $itemID))->first()->price;
		
			echo "Item ID: " . $itemID . " Name: " . $itemName . " Qty: " . $itemQty . " Price: " . $itemPrice . "</br>";
		
			$totalPrice = $totalPrice + ($itemQty * $itemPrice);
		
		
		}
        
        echo "Total Price: $" . $totalPrice;

      }

      else {
        echo "There are no items in the shopping cart.";
      }

      //session_destroy();


    ?>

  </div>

  <a class="btn btn-danger" href='process.php?action=empty'>Empty Cart</a>

<?php
  include('footer.php');
?>
