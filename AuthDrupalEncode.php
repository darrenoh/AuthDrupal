<?php

/*
 * AuthDrupalEncode.php 0.6, 2008-06
 * 
 * This produces an obfuscated string that is meant to be hard to spoof and
 * thus verifies that the login is legitimate.
 * 
 * The best way to do this would be to encrypt the username on the Drupal
 * side, transmit an encrypted string, and decrypt it here. However, haven't
 * found a portable encryption alternative. md5() and crypt() are both one-way
 * and cannot be de-crypted. mcrypt() is not installed with PHP by default, 
 * so many servers do not have it. 
 */


function authdrupal_encode($plain_string)
{
	// Admin must set the key to something unique to their site to prevent this
	// technique from being trivially spoofable--so refuse to encode if the 
	// key is unchanged
	if ( empty( $GLOBALS['wgAuthDrupal_security_key'] ) 
	     || ( 'ReplaceThisString' == $GLOBALS['wgAuthDrupal_security_key'] ) ) {
	     	return null;
	}
	
	// concatenate the given string with the secret key
	$str = $plain_string . $_SERVER["REMOTE_ADDR"] . $GLOBALS['wgAuthDrupal_security_key'];

	// sort the characters
	$a = str_split( $str, 1 );
	sort( $a, SORT_STRING );

	// turn back into string and scramble with md5()
	return md5( implode( '', $a ) );
}

?>
