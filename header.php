<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <title>PHP Shopping Cart</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">

      <ul class="nav nav-tabs" role="tablist">
        <li class='<?php if($page == "home") { echo "active"; } ?>'><a href="index.php">Home</a></li>
        <li class='<?php if($page == "products") { echo "active"; } ?>'><a href="products.php">Products</a></li>
        <li class='<?php if($page == "cart") { echo "active"; } ?>'><a href="cart.php">Cart
          <?php

            if (isset($_SESSION['cart'])) {

            ?>
              <span class="badge">

                <?php echo count($_SESSION['cart']); ?>

              </span>

          <?php
            }
          ?></a></li>

      </ul>
