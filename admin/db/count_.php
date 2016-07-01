<?php 
	include_once("../db/conf.php");
	$sql = "SELECT * FROM category";
	$result = $con->query($sql);
	echo $result->num_rows;
?>