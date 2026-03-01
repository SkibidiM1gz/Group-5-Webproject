<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "golby_pizzeria";
	$connection = new mysqli($hostname, $username, $password, $database);

	if ($connection->connect_error) {
		echo $connection->connect_error();
	}
?>