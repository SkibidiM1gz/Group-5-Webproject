<?php
	/**
	 * navigation.php is used for storing utility methods related to navigation
	 * 
	 * Every page must include this
	 */

	/**
	 * @return the file path of the currently executing page
	 */
	function getCurrentFilePath() {
		return $_SERVER['SCRIPT_FILENAME'];
	}

	/**
	 * Generates a relative filepath given the $from filepath and $to filepath
	 * 
	 * @param $from the starting filepath
	 * @param $to the destination filepath
	 * 
	 * @return a relative filepath $from filepath pointing to $to filepath
	 */ 
	function generateRelativePath(string $from, string $to): string
	{
	    // Remove leading slashes
	    $from = rtrim($from, '/');
	    $to   = rtrim($to, '/');

	    // Remove "current directory" reference
	    $from = ltrim($from, ".");
	    $to = ltrim($to, ".");

	    // Break into arrays
	    $fromParts = explode('/', $from);
	    $toParts   = explode('/', $to);

	    // Find a common path
	    $length = min(count($fromParts), count($toParts));
	    $commonIndex = 0;
	    for ($i = 0; $i < $length; $i++) {
	        if ($fromParts[$i] !== $toParts[$i]) {
	            break;
	        }
	        $commonIndex++;
	    }

	    // Go up for remaining $from parts
	    // Exclude the file itself by subtracting by 1
	    $up = array_fill(0, abs(count($fromParts) - $commonIndex - 1), '..');

	    // Go down for remaining $to parts
	    $down = array_slice($toParts, $commonIndex);
	    $relativeParts = array_merge($up, $down);

	    return empty($relativeParts) ? './' : implode('/', $relativeParts);
	}
?>