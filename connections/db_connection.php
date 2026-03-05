<?php
	/**
	 * db_connection.php contains utilities for establishing database connections
	 */

	/**
	 * Create a database connection
	 */
	function createConnection() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "golby_pizzeria"; // Change database name as necessary
		$db_connection = new mysqli($hostname, $username, $password, $database);

		if ($db_connection->connect_error) {
			return $db_connection->connect_error();
		}

		return $db_connection;
	}
?>