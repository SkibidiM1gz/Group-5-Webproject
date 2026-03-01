<?php
// include "./db_connection.php";

	function getProductList() {
		global $db_connection;
		$sql = "SELECT * FROM products;";
		$products = $db_connection->query($sql) or die ($db_connection);
		
	}
	// echo getProductList();
?>