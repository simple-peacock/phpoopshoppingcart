<?php

/*
 * process.php
 * Our backend processing script
 * Takes input via $_POST AJAX call and makes requests to our Cart class
 *
 */

use SimplePeacock\Cart;

session_start();

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// include files
require_once 'config.php';
require_once 'vendor/autoload.php';

$cart = new Cart();

// perform the action posted
switch ($_POST['action']) {

    case 'add':
        $id = $_POST['id'];
        $cart->addItem($id);
        $_SESSION['flashmessage'] = "Product Added.";
        break;

    case 'remove':
        $id = $_POST['id'];
        $cart->removeItem($id);
        $_SESSION['flashmessage'] = "Product Removed.";
        break;

    case 'empty':
        $cart->destroy();
        $_SESSION['flashmessage'] = "Cart has been emptied.";
        break;
}
