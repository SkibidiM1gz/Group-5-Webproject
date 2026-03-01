<?php
	function generateRelativePath(string $from, string $to): string
	{
	    // Normalize directory separators
	    // $from = str_replace('\\', '/', $from);
	    // $to   = str_replace('\\', '/', $to);

	    // Note: I dont understand this purpose, I dont trust this, dont include
	    // If $from is a file, use its directory
	    // if (!is_dir($from)) {
	    //     $from = dirname($from);
	    // }

	    // Remove leading slashes
	    $from = rtrim($from, '/');
	    $to   = rtrim($to, '/');

	    // Remove "current directory" reference
	    $from = ltrim($from, ".");
	    $to = ltrim($to, ".");

	    // Break into arrays
	    $fromParts = explode('/', $from);
	    $toParts   = explode('/', $to);

	    // Find common path parts
	    $length = min(count($fromParts), count($toParts));
	    $commonIndex = 0;
	    for ($i = 0; $i < $length; $i++) {
	        if ($fromParts[$i] !== $toParts[$i]) {
	            break;
	        }
	        $commonIndex++;
	    }

	    // Go up for remaining $from parts
	    // Exclude the file itself by subtracting also by 1
	    $up = array_fill(0, abs(count($fromParts) - $commonIndex - 1), '..');

	    // Add remaining $to parts
	    $down = array_slice($toParts, $commonIndex);
	    $relativeParts = array_merge($up, $down);

	    return empty($relativeParts) ? './' : implode('/', $relativeParts);
	}

	function setActive($thisFile, $linkName): string {
		return (basename($thisFile) === $linkName) ? "class='active-page'" : "";
	}

	function generateNavigationBar() {
		$projectRoot = $_SERVER['DOCUMENT_ROOT']."/".Project::$rootName;
		$thisFile = $_SERVER['SCRIPT_FILENAME'];

		$logo = generateRelativePath($thisFile, $projectRoot."/images/logo.png");
		$home = generateRelativePath($thisFile, $projectRoot."/index.php");
		$aboutus = generateRelativePath($thisFile, $projectRoot."/aboutus.php");
		$faq = generateRelativePath($thisFile, $projectRoot."/faq.php");
		$cart = generateRelativePath($thisFile, $projectRoot."/cart.php");
		$products = generateRelativePath($thisFile, $projectRoot."/products/products.php");

		echo "<img class='logo' src='$logo'>";
		echo "<nav>";
	    echo "	<ul>";

	    // PROSOSAL: Implement automatic link generation for easy navigation editing

	    echo "      <li ".setActive($thisFile, "index.php")."><a href='$home'>Home</a></li>";
	    echo "      <li ".setActive($thisFile, "aboutus.php")."><a href='$aboutus'>About Us</a></li>";
	    echo "      <li ".setActive($thisFile, "faq.php")."><a href='$faq'>FAQ</a></li>";
	    echo "      <li ".setActive($thisFile, "cart.php")."><a href='$cart'>Cart</a></li>";
	    echo "      <li ".setActive($thisFile, "products.php")."><a href='$products'>Products</a></li>";

	    echo "      <!--<li><a href='login.html'>Login</a></li>-->";
	    echo "      <!--<li><a href='user_account.html'>Account</a></li>-->";
	    echo "  </ul>";
	    echo "</nav>";
	}
	generateNavigationBar();

	// TODO Finish implementation of relative file path generator
?>