<?php

	include_once("conf.php");
	$sql = "DELETE FROM sales WHERE id='".$_POST['id']."'";
	$con->query($sql);

?>