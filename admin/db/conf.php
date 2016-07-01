<?php 
	ini_set('error_reporting', E_ALL|E_STRICT);
	ini_set('display_errors', 1);


	$HOST			= "localhost";				// Host domain
	$USER			= "TP";					// Username
	$PASSWORD		= "admintp"; 				// Password
	$DBNANME		= "POS";				// Database Name
	// connection with mysqli 
	$con = new mysqli($HOST, $USER, $PASSWORD, $DBNANME);
?>
