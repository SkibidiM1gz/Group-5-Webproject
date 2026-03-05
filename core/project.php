<?php
	/**
	 * project.php contains variables and methods related to this project for the purpose
	 * of consistency.
	 * 
	 * Every page must include this.
	 */

	class Project {

		// public static function tree() {
		// 	$directory = new FilesystemIterator('./');
		// 	$fileList = array();

		// 	foreach ($directory as $fileInfo) {
		// 		if ($fileInfo->isFile()) {
		// 			$fileList[] = $fileInfo->getFilename();
		// 		}
		// 	}

		// 	print_r($fileList);
		// }

		// public static function getPageFilePath($pageName) {

		// }

		// protected $tree = [
		// 	""
		// ];

		// public static $mainNavPages = [
		// 	"home" => [
		// 		"fileName" => "index.php",
		// 		"linkDisplay" => "Home",
		// 	],
		// 	"products" => [
		// 		"filename" => "products.php",
		// 		"linkDisplay" => "Products",
		// 	]
		// ];

		// public static $tree = [
		// 	"home" => "index.php",
		// 	"faq" => "faq.php",
		// 	"cart" => "cart.php",
		// 	"products" => "products.php"
		// ];

		public static $rootName = "group-project"; // used in generateNavigationBar() method
	}

	// Project::tree();

	// $projectFolder = "group-project";
	// for ($i = 0; $i < count($_SERVER); $i++) {
		// echo implode("<br><br>", $_SERVER);
	// }
?>