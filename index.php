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
        <p><a class="btn btn-primary" href="https://github.com/simple-peacock/phpoopshoppingcart" role="button">Go To GitHub</a></p>
    </div>

	<h2>TODO</h2>

	<ul>
		<li>messaging system, show totals - Done</li>
		<li>improve cart display page - Done</li>
		<li>ability to remove items - Done</li>
		<li>show number of items in cart in the navigation - Done</li>
		<li>create an Item class?</li>
		<li>ability to update quantity?</li>
		<li>autoloader? - Done</li>
		<li>add some images to our store - Done</li>
		<li>name spacing - Done</li>
        <li>add continue shopping and checkout buttons - Done</li>
	</ul>

<?php
	include('footer.php');
?>
