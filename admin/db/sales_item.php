<?php 
	include_once("conf.php");
	if(isset($_GET['page'])){
		$num = ($_GET['page']-1)*8;
		$sql = "SELECT * FROM products order by Public desc limit $num, 8";
	}
	else if(isset($_GET['search'])){
		$key = $_GET['search'];
		$sql = "SELECT * FROM products WHERE ID like '%$key%' or Name like '%$key%' or Price like '%$key%' or Color like '%$key%' or Size like '%$key%' order by Public desc limit 0, 8";
	}
	else if(isset($_GET['query']) && isset($_GET['page'])){
		$num = ($_GET['page']-1)*8;
		$key = $_GET['query'];
		$sql = "SELECT * FROM products WHERE ID like '%&key%' or Name like '%key%' or Price like '%$key%' or Color like '%$key%' or Size like '%$key%' order by Public desc limit $num, 8";
	}
	else{
		$sql = "SELECT * FROM products order by Public desc limit 0, 8";
	}
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
	        <div class="col-lg-3">
	        	<div class="slide-item">
					<img class="thumb" src="../img/<?= $row['image'] ?>">
					<div style="position:relative;">
						<span class="summary">
							<i class="fa fa-shopping-cart" id="buy" data-toggle="modal" data-target="#buying" id="info" id="remove"></i>
							<i class="fa fa-info-circle" data-toggle="modal" data-target="#detail" id="info" id="remove"></i>
						</span>
						<span class="price">$ <?= $row['Price'] ?></span>
					</div>
					<div class="data" style="display: none;">
						<span><?= $row['ID'] ?></span>
						<span><?= $row['Name'] ?></span>
						<span><?= $row['Size'] ?></span>
						<span><?= $row['Color'] ?></span>
						<span><?= $row['Price'] ?></span>
						<span><?= $row['Numbers'] ?></span>
						<span><?= $row['Type'] ?></span>
						<span><?= $row['image'] ?></span>
						</div>
				</div>
	        </div>
		<?php
	}
?>	
