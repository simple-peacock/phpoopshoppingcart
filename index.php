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
			  	<li class="active"><a href="#">Home</a></li>
			 	<li><a href="#">Products</a></li>
			  	<li><a href="cart.php">Cart</a></li>
			</ul>


	<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>  -->
	<?php
		// show errors - we can remove this later
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		require_once 'config.php';
		require_once 'classes/Cart.php';
		require_once 'classes/DB.php';

		$db = DB::getInstance();

		$products = $db->get('products', array('inventory', '>', 0));

		if($products->count()) {

			foreach($products->results() as $product) {

				echo 'Id: ' . $product->id . '<br>';
				echo 'Product Name: ' . $product->name . '<br>';
				echo 'Product Description: ' . $product->description . '<br>';
				echo 'Price: $' . $product->price . '<br>';

			}

		} else {

			echo 'No products to display';

		}

	?>

	</div>
	</body>
</html>
