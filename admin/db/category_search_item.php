<?php 
	include_once("../db/conf.php");
	$query = $_GET['pages'];
	$sql = "SELECT * FROM category WHERE ID like '%$query%' or Name like '%$query%'";
	$result = $con->query($sql);
	echo $result->num_rows;
?>