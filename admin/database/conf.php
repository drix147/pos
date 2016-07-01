<?php
	ini_set('error_reporting', E_ALL|E_STRICT);
	ini_set('display_errors', 1);
	$_HOST = "localhost";
	$_USERNAME = "root";
	$_PASSWORD = "";
	$_DBNAME = "POS";
	class POS{
		var $con;
		var $verify;
		function con($_HOST, $_USERNAME, $_PASSWORD, $_DBNAME){
			$con = new mysqli($_HOST, $_USERNAME, $_PASSWORD, $_DBNAME);
			if($con->connect_error){
				return false;
			}else{
				return $con;
			}
		}
		function close($con){
			return $con->close();
		}
		function verify_user($user){
			if(!isset($_SESSION[$user])){
				header("Location: ../../index.php");
				exit;
			}
		}

	}
	$use = new POS();
?>