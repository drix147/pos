<ul class="pagination">
<?php
	include_once("conf.php");
	$sql = "SELECT ID, count(Quality) Quality, Price, Sales_at FROM sales group by ID";
	$result = $con->query($sql);
	for($i=0; $i<ceil($result->num_rows/6); $i++){
		?>
			<li id="<?= $i+1 ?>"><a href=""><?= ($i+1) ?></a></li>
		<?php
	}
?>
</ul>