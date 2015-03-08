<?php

/*
 * cart.php
 * This page displays the contents of our shopping cart.
 *
 */

use SimplePeacock\Cart;
use SimplePeacock\DB;

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

?>
<div>

    <h1>Cart Contents</h1>

    <!--Our alert message place holder-->
    <div class="row" id="alert_placeholder"></div>

    <?php


    /*
     *
     * Flash message - when products are added to our cart
     *
     */

    if(isset($_SESSION['flashmessage'])) {

        ?>

        <div class="alert alert-success" role="alert"><?php echo $_SESSION['flashmessage']; ?></div>

        <?php

        // remove the message so it does not persist on page refresh
        unset($_SESSION['flashmessage']);
    }

    if($cart->countItems() > 0) {
    // note that our Cart object was instantiated in the header

        $db = DB::getInstance();

        $cartItems = $cart->getItems();

        $totalPrice = 0;

        ?>

        <table class="table table-striped">

            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
            </tr>

            <?php

            foreach(array_keys($cartItems) as $itemID) {

                $itemQty = $cartItems[$itemID]['qty'];
                $itemName = $db->action('SELECT name', 'products', array('id', '=', $itemID))->first()->name;
                $itemPrice = $db->action('SELECT price', 'products', array('id', '=', $itemID))->first()->price;

                ?>
                <tr>
                    <td><?php echo $itemID ?></td>
                    <td><?php echo $itemName ?></td>
                    <td><?php echo $itemQty ?></td>
                    <td>$<?php echo number_format($itemPrice, 2, '.', ',') ?></td>

                    <!-- our remove item button -->
                    <td><a class="close" onclick='postData("remove", <?php echo $itemID; ?>)'><span>&times;</span></a></td>

                </tr>

                <?php

                $totalPrice = $totalPrice + ($itemQty * $itemPrice);

            }
            ?>

        </table>

        <?php

        // display total price with decimals and comma for thousands
        echo "Total Price: $" . number_format($totalPrice, 2, '.', ',');

    }

    else {

        echo "There are no items in the shopping cart.";

    }

    ?>

</div>


<?php

if($cart->countItems()) {

    ?>

    <div class="row"><a class="btn btn-danger pull-right" onclick='postData("empty")'>Empty Cart</a></div>

    <div class="row">
    <a class="btn btn-success pull-left" href="products.php">< Continue Shopping</a>

    <a class="btn btn-primary pull-right" href="#p">Checkout ></a></div>

    <?php
}

  include('footer.php');

?>
