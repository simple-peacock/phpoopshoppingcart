<?php

/*
 * products.php
 * Products Page - display available products from the database
 *
 */

use SimplePeacock\DB;

$page = "products";
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
	<h1>Products</h1>
</div>


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



/*
 *
 * Display available products from database
 *
 */

// we are using our database wrapper DB.php inside classes folder
$db = DB::getInstance();

$products = $db->get('products', array('inventory', '>', 0));

if($products->count()) {

    foreach($products->results() as $product) {
?>
		<div class="row top-buffer-medium" id="productlist">

			<div class="col-sm-3">
				<img class="img-responsive center-block" src="img/products/<?php echo $product->imagepath; ?>"/>
			</div>

			<div class="col-sm-6">
				<h3><strong><?php echo $product->name; ?></strong></h3>
				<p><?php echo stripslashes($product->description); ?></p>
	        </div>

			<div class="col-sm-3 text-center">
				<h3>$<?php echo number_format($product->price, 2, '.', ','); ?></h3>
				<p><a class="btn btn-success" onclick='postData("add", <?php echo $product->id; ?>)'>Add To Cart</a></p>
				<p><a href="">Add to Wish List</a></p>
				<p><a href="">Add to Compare</a></p>
			</div>

		</div>

		<hr>
<?php

	} // close our foreach loop used to display available products

	} else {

		// display message if there are no available products to purchase
		echo 'There are no available products';

	}

	include('footer.php');
?>
