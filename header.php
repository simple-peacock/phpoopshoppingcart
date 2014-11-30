<?php

	/*
	 *
	 * Header Page - included on other pages
	 * 
	 */

	session_start();
	
	require_once 'classes/Cart.php';
	
?>
<!DOCTYPE html>
<html lang="en">

  	<head>
    	<meta charset="utf-8" />
    	<title>PHP Shopping Cart</title>
    	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  	</head>

  	<body>
  
	<!-- main body container -->
	<div class="container">

		<!-- begin navigation -->
      	<ul class="nav nav-tabs" role="tablist">
        	<li class='<?php if($page == "home") { echo "active"; } ?>'><a href="index.php">Home</a></li>
        	<li class='<?php if($page == "products") { echo "active"; } ?>'><a href="products.php">Products</a></li>
       		<li class='<?php if($page == "cart") { echo "active"; } ?>'><a href="cart.php">Cart
          	
          	<?php
			/*
	 		 *
	 		 * This bit of code displayes the number of items
	 		 * currently in our shopping cart.
	 		 *
	 		 */
	 		 
	 		$cart1 = new Cart();
	 		
	 		$itemCount = $cart1->countItems();

        	if($itemCount > 0) {

            ?>
              		<span class="badge">

                		<?php echo $itemCount; ?>

              		</span>

          	<?php } ?></a></li>

		</ul>
		<!-- end of navigation -->