<?php 
	include_once("conf.php");
	if(isset($_GET['item'])){
		$sql = "SELECT * FROM products WHERE Type =".$_GET['item'];
	}
	else if(isset($_GET['key_search']) && isset($_GET['p_selected'])){
		$query = $_GET['key_search'];
		$type = $_GET['p_selected'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Size like '%$query%' or Color like '%$query%' or Price like '%$query%' AND Type='$type'";
	}
	else if(isset($_GET['query'])){
		$query = $_GET['query'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Type like '%$query%' or Price like '%$query%' or Size like '%$query%'";
	}
	else if(isset($_GET['search'])){
		$s = $_GET['search'];
		$sql = "SELECT * FROM products WHERE ID like '%$s%' or Name like '%$s%' or Color like '%$s%' or Size like '%$s%' or Price like '%&s%' or Type like '%$s%'";
	}
	else{
		$sql = "SELECT * FROM products";
	}
	$result = $con->query($sql);
	echo $result->num_rows;
?>