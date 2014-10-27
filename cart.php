<?php
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

        print_r($_SESSION['cart']);

        

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
