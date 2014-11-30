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

	<h1>PHP OOP Shopping Cart</h1>

	TODO
	<ul>
		<li>messaging system, show totals - Done</li>
		<li>improve cart display page - Done</li>
		<li>ability to remove items - Done</li>
		<li>show number of items in cart in the navigation - Done</li>
		<li>create an Item class?</li>
		<li>update quantity?</li>
		<li>autoloader?</li>
		<li>add some images to our store</li>
	</ul>

<?php
	include('footer.php');
?>
