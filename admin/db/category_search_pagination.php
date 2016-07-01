<ul class="pagination">
<?php 
	include_once("../db/conf.php");
	$query = $_GET['pages'];
	$sql = "SELECT * FROM category WHERE ID like '%$query%' or Name like '%$query%'";
	$result = $con->query($sql);
	for ($i=0; $i <ceil($result->num_rows/5) ; $i++) { 
		?>
			<li id="<?= $i+1 ?>"><a href=""><?= $i+1 ?></a></li>
		<?php
	}
	
?>
</ul>