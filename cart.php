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
                    <td><?php echo $itemPrice ?></td>

                    <!-- our remove item button -->

                    <td><a class="close" onclick='postData("remove", <?php echo $itemID; ?>)'><span>&times;</span></a></td>

                </tr>

                <?php

                $totalPrice = $totalPrice + ($itemQty * $itemPrice);

            }
            ?>

        </table>

        <?php

        echo "Total Price: $" . $totalPrice;

    }

    else {

        echo "There are no items in the shopping cart.";

    }

    ?>

</div>


<?php

if($cart->countItems()) {

    ?>

    <p><a class="btn btn-danger" href='process.php?action=empty'>Empty Cart</a></p>

    <?php
}

  include('footer.php');

?>
