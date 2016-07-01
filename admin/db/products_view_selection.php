<select class="form-control" name="pselect">
	<option value="all">All</option>
<?php 
	include_once("conf.php");
	$sql = "SELECT * FROM category";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
			<option value="<?= $row['ID'] ?>"><?= $row['Name'] ?></option>
		<?php
	}
?>
<select>