<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "golby_pizzeria";
	$db_connection = new mysqli($hostname, $username, $password, $database);

	if ($db_connection->connect_error) {
		echo $db_connection->connect_error();
	}
?>