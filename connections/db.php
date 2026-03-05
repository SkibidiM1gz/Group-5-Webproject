<?php
	/**
	 * Contains utility methods for database interaction with database
	 */

	function getProductList() {
		global $db_connection; // access the $db_connection variable
		$sql = "SELECT * FROM products;";
		$products = $db_connection->query($sql) or die ($db_connection);
		
	}
?>