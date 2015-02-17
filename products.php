<?php

	/*
   *
   * Products Page - display available products from the database
   *
   */

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
  require_once 'classes/DB.php';
?>

<h1>Products</h1>

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
		<div class="row" id="productlist">

			<div class="col-md-2">

				<img class="img-responsive" src="img/<?php echo $product->imagepath; ?>"></img>

			</div>


			<div class="col-md-6">

				<p>Id: <?php echo $product->id; ?></p>
				<p>Product Name: <?php echo $product->name; ?></p>
				<p>Product Description: <?php echo $product->description; ?></p>
				<p>Price: $<?php echo $product->price; ?></p>

				<!-- our 'Add To Cart' button -->
	      <a class="btn btn-danger" href='process.php?action=add&id=<?php echo $product->id; ?>'>Add To Cart</a>

	    </div>

		</div>
<?php

		} // close our foreach loop

	} else {

		// display message if there are no avilable products to purchase
		echo 'There are no available products';

	}

	include('footer.php');
?>
