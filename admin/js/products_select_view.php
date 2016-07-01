<?php 
	include_once("conf.php");
	$type = $_POST['itemType'];
	$sql = "SELECT * FROM products where ID = '$type' order by Public desc";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
	        <div class="col-lg-3">
	        	<div class="slide-item">
					<img class="thumb" src="../img/<?= $row['image'] ?>">
					<div style="position:relative;">
						<span class="summary">Code : <?= $row['ID'] ?></span>
						<span class="price">$ <?= $row['Price'] ?></span>
					</div>
				</div>
	        </div>
		<?php
	}
	echo '<div class="clearfix"></div>';
?>	