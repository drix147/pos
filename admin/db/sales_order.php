<?php
	include_once("conf.php");
	$sql = "SELECT * FROM orders";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		$cp = "INSERT INTO sales (ID, Quality, Price, Sales_at) values ('".$row['ID']."', '".$row['Quality']."', '".$row['Price']."', now())";
		$res = $con->query($cp);
	}
	$drop = "DELETE FROM orders";
	$con->query($drop);
?>