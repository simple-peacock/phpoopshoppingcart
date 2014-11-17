<?php
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
  require_once 'classes/Cart.php';
  require_once 'classes/DB.php';


  /*
   *
   * Capture $_GET variables
   *
   */

  $cart = new Cart();

  if(isset($_GET['action']) && $_GET['action'] == 'add') {

    $id = $_GET['id'];

    $cart->addItem($id);

    $cart->persist();

    // redirect back to products page
    $_SESSION['flashmessage'] = "Product Added.";
    header('Location: products.php');

  }

  if(isset($_GET['action']) && $_GET['action'] == 'empty') {

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    // redirect back to cart page
    header('Location: cart.php');

    // message
  }
