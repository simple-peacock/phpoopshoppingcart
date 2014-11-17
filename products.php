<?php
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

	if(isset($_SESSION['flashmessage'])) {
?>
	
		<div class="alert alert-success" role="alert"><?php echo $_SESSION['flashmessage']; ?></div>
<?php
	
		// remove the message so it does not come up when a user refreshes
		unset($_SESSION['flashmessage']);	
	}

    /*
     *
     * Display available products from database
     *
     */

     $db = DB::getInstance();

     $products = $db->get('products', array('inventory', '>', 0));

     if($products->count()) {

       foreach($products->results() as $product) {
?>

         <div>
           <p>Id: <?php echo $product->id; ?></p>
           <p>Product Name: <?php echo $product->name; ?></p>
           <p>Product Description: <?php echo $product->description; ?></p>
           <p>Price: $ <?php echo $product->price; ?></p>

           <a class="btn btn-danger" href='process.php?action=add&id=<?php echo $product->id; ?>'>Add To Cart</a>

         </div>

<?php

       }

     } else {

       echo 'No products to display';

     }

  include('footer.php');
?>
