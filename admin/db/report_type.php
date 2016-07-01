<option value="all">All</option>
<?php
	include_once("conf.php");
	$sql = "SELECT Name FROM category";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
			<option value="<?= $row['Name'] ?>"><?=$row['Name'] ?></option>
		<?php
	}

?>