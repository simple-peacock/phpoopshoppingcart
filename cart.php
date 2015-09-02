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

<div class="top-buffer-medium">
    <h1>Cart Contents</h1>
</div>

<?php



/*
 *
 * Flash message - display message when products are added to our cart
 *
 */

if(isset($_SESSION['flashmessage'])) {

    ?>

    <div class="alert alert-success" role="alert"><?php echo $_SESSION['flashmessage']; ?></div>

    <?php

    // remove the message so it does not persist on page refresh
    unset($_SESSION['flashmessage']);
}



/*
 *
 * Display cart contents or else display message advising no items in cart
 *
 */

if($cart->countItems() > 0) {
// note that our Cart object was instantiated in the header

    $db = DB::getInstance();

    $cartItems = $cart->getItems();

    $totalPrice = 0;

    ?>

    <table class="table table-striped top-buffer-medium">

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

        } // end foreach loop
        ?>

        <!-- display final row showing total price -->
        <tr>
            <td></td>
            <td></td>
            <td><strong>Total Price:</strong></td>
            <td><strong><?php echo "$" . number_format($totalPrice, 2, '.', ','); ?></strong></td>
            <td></td>
        </tr>

    </table>
    <!-- end of table listing cart items and total price -->

    <!-- "Empty Cart" button -->
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-danger pull-right" onclick='postData("empty")'>Empty Cart <span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </div>
    </div>

    <!-- Our "Continue Shopping" and "Checkout" buttons -->
    <div class="row top-buffer-small">
        <div class="col-md-12">
            <a class="btn btn-success pull-left" href="products.php"><span class="glyphicon glyphicon glyphicon-menu-left" aria-hidden="true"></span> Continue Shopping</a>
            <a class="btn btn-primary pull-right" href="#p">Checkout <span class="glyphicon glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
        </div>
    </div>

    <?php

} // end if statement

else {
?>
    <div class="row">
        <div class="col-md-12">
            <p>There are no items in your cart</p>
            <a class="btn btn-success pull-left" href="products.php">Go Shopping</a>
        </div>
    </div>

<?php

} // end else statement



/*
 *
 * Our footer
 *
 */

include('footer.php');

?>

