<?php
	$db = mysqli_connect('localhost', 'root', '', 'Restaurants');

	// Connection error detection
	if (mysqli_connect_errno()) {
		echo("Could not connect to database: ".mysqli_connect_error());
		exit;
	}

	$table = 'RestaurantInfo';
	
?>