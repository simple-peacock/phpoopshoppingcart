<?php

	/*
	 *
	 * Home Page
	 *
	 */

	$page = 'home';
	include('header.php');



	/*
	 *
	 * Error Reporting (remove this later in production)
	 *
	 */

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>

    <div class="jumbotron">
        <h1>PHP OOP Shopping Cart</h1>
        <p>A simple shopping cart written in PHP.</p>
        <p><a class="btn btn-primary" href="products.php" role="button">View Products</a></p>
    </div>

<?php
	include('footer.php');
?>
