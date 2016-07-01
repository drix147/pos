<select name="type" class="form-control">
<?php 
	include_once("conf.php");
	$sql = "SELECT distinct ID FROM category";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
			<option value="<?= $row['ID'] ?>"><?= $row['ID'] ?></option>
		<?php
	}
?>
<select>