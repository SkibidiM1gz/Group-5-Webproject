<?php
	/**
	 * page.php contains utility methods for generating default content inside
	 * a webpage.
	 * 
	 * Every page must include this
	 */ 

	/**
	 * Used in generateNavigationBar() method to set the active-page class of links
	 */ 
	function setActive($thisFile, $linkName): string {
		return (basename($thisFile) === $linkName) ? "class='active-page'" : "";
	}


	/**
	 * Call this method to generate the navigation bar inside the <header> tag
	 */
	function generateNavigationBar() {
		$projectRoot = $_SERVER['DOCUMENT_ROOT']."/".Project::$rootName;
		$thisFile = $_SERVER['SCRIPT_FILENAME'];

		$logo = generateRelativePath($thisFile, $projectRoot."/images/logo.png");
		$home = generateRelativePath($thisFile, $projectRoot."/index.php");
		$aboutus = generateRelativePath($thisFile, $projectRoot."/aboutus.php");
		$faq = generateRelativePath($thisFile, $projectRoot."/faq.php");
		$cart = generateRelativePath($thisFile, $projectRoot."/cart.php");
		$products = generateRelativePath($thisFile, $projectRoot."/products.php");
		$client_account = generateRelativePath($thisFile, $projectRoot."/client_account.php");

		// Note: edit this as needed
		echo "<img class='logo' src='$logo'>";
		echo "<nav>";
	    echo "	<ul>";
	    echo "      <li ".setActive($thisFile, "index.php")."><a href='$home'>Home</a></li>";
	    echo "      <li ".setActive($thisFile, "aboutus.php")."><a href='$aboutus'>About Us</a></li>";
	    echo "      <li ".setActive($thisFile, "faq.php")."><a href='$faq'>FAQ</a></li>";
	    echo "      <li ".setActive($thisFile, "cart.php")."><a href='$cart'>Cart</a></li>";
	    echo "      <li ".setActive($thisFile, "products.php")."><a href='$products'>Products</a></li>";
	    echo "      <li ".setActive($thisFile, "client_account.php")."><a href='$client_account'>Account</a></li>";
	    echo "      <!--<li><a href='login.html'>Login</a></li>-->";
	    echo "  </ul>";
	    echo "</nav>";
	}

	/**
	 * Call this method to generate content inside <footer> tag
	 */
	function generateFooterInfo() {
        echo "<p class='footer-content'>&copy;Golby's Pizzeria 2026</p>";
        echo "<p class='footer-content'>Contact us: golbyspizzeria@gmail.com | +639618250366</p>";
	}
?>