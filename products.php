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

<h1>Products</h1>

<!--Our alert message place holder-->
<div class="row" id="alert_placeholder"></div>


<?php

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
		<div class="row" id="productlist">

			<div class="col-md-2">

				<img class="img-responsive" src="img/<?php echo $product->imagepath; ?>"/>

			</div>


			<div class="col-md-6">

				<p>Id: <?php echo $product->id; ?></p>
				<p>Product Name: <?php echo $product->name; ?></p>
				<p>Product Description: <?php echo $product->description; ?></p>
				<p>Price: $<?php echo $product->price; ?></p>

				<!-- our 'Add To Cart' button -->
	            <a class="btn btn-danger" onclick='postData("add", <?php echo $product->id; ?>)'>Add To Cart</a>

	        </div>

		</div>
<?php

	} // close our foreach loop used to display available products

	} else {

		// display message if there are no available products to purchase
		echo 'There are no available products';

	}

	include('footer.php');
?>
