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
		
			Body

		</div>
	 
	<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>  -->
	<?php
		// show errors - we can remove this later
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		require_once 'config.php';

		try {
		    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USERNAME, PASSWORD);
		}
		 
		//handle connection error
		catch(PDOException $exception){
		    echo "Connection error: " . $exception->getMessage();
		}

		if($db) {
			echo "Connection Successfull";
		}
	?>

	</body>
</html>