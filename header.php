<?php

/*
 * header.php
 * Header Page - included on other pages
 *
 */

use SimplePeacock\Cart;

session_start();

require_once 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

  	<head>
    	<meta charset="utf-8" />
    	<title>PHP Shopping Cart</title>

    	<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/mystyles.css">

  	</head>

  	<body>

    <?php include_once('googleanalytics.php'); ?>  

	<!-- main body container -->
	<div class="container">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- begin navigation -->
                <ul class="nav navbar-nav">
                    <li class='<?php if($page == "home") { echo "active"; } ?>'><a href="index.php">Home</a></li>
                    <li class='<?php if($page == "products") { echo "active"; } ?>'><a href="products.php">Products</a></li>
                    <li class='<?php if($page == "cart") { echo "active"; } ?>'><a href="cart.php">Cart

                    <?php
                    /*
                     * This code displays the number of items
                     * currently in our shopping cart.
                     *
                     */

                    $cart = new Cart();

                    $itemCount = $cart->countItems();

                    if($itemCount > 0) {

                    ?>
                            <span class="badge">

                                <?php echo $itemCount; ?>

                            </span>

                    <?php } ?>
                        </a></li>

                </ul>
            </div>
        </nav>
		<!-- end of navigation -->
