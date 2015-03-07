<?php

/*
 * process.php
 * Our backend processing script
 * Takes input via $_GET and makes calls to our Cart class
 *
 */

use SimplePeacock\Cart;

session_start();



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
require_once 'vendor/autoload.php';

$cart = new Cart();



/*
 *
 * 'Add To Cart'
 *
 */

if($_POST['action'] == 'add') {

    $id = $_POST['id'];

    $cart->addItem($id);

    // this will show up in console.log
    echo "Product added successfully";

}



/*
  *
  * Remove an item from the cart
  *
  */

if($_POST['action'] == 'remove') {

    $id = $_GET['id'];

    $cart->removeItem($id);

    // flash message and redirect back to cart page
    $_SESSION['flashmessage'] = "Product Removed.";
    header('Location: cart.php');

}



/*
 *
 * 'Empty Cart'
 *
 */

if($_POST['action'] == 'empty') {

    $cart->destroy();

    // flash message and redirect back to cart page
    $_SESSION['flashmessage'] = "Cart has been emptied.";
    header('Location: cart.php');

}
