<?php

ini_set ( "display_errros", 1 );
ini_set ( "error_reporting", E_ALL );

set_include_path ( get_include_path () . PATH_SEPARATOR . dirname ( __FILE__ ) );

/**
 * @return string the container name
 */
function getContainer() {
	return getParameterValue ( 'CONTAINER' );
}

/**
 * @return string the password
 */
function getPassword() {
	return getParameterValue ( 'PASSWORD' );
}

/**
 * @return string the application location 
 */
function getApplicationLocation() {
	return getParameterValue ( 'APPLICATION_BASE_DIR' );
}

/**
 * Returns the value of the application deployment parameter
 * @param string $name
 * @return string
 */
function getParameterValue($name) {
	return getenv('ZS_' . $name);
}

/**
 * @param array $assoc_arr
 * @param string $path
 * @param boolean $has_sections
 * @return boolean
 */
function write_ini_file($assoc_arr, $path, $has_sections = FALSE) {
	$content = "";
	if ($has_sections) {
		foreach ( $assoc_arr as $key => $elem ) {
			$content .= "[" . $key . "]\n";
			foreach ( $elem as $key2 => $elem2 ) {
				if (is_array ( $elem2 )) {
					for($i = 0; $i < count ( $elem2 ); $i ++) {
						$content .= $key2 . "[] = \"" . $elem2 [$i] . "\"\n";
					}
				} else if ($elem2 == "")
					$content .= $key2 . " = \n";
				else
					$content .= $key2 . " = \"" . $elem2 . "\"\n";
			}
		}
	} else {
		foreach ( $assoc_arr as $key => $elem ) {
			if (is_array ( $elem )) {
				for($i = 0; $i < count ( $elem ); $i ++) {
					$content .= $key2 . "[] = \"" . $elem [$i] . "\"\n";
				}
			} else if ($elem == "")
				$content .= $key2 . " = \n";
			else
				$content .= $key2 . " = \"" . $elem . "\"\n";
		}
	}
	
	if (! $handle = fopen ( $path, 'w' )) {
		return false;
	}
	if (! fwrite ( $handle, $content )) {
		return false;
	}
	fclose ( $handle );
	return true;
}