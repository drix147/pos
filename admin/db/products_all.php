<?php 
	include_once("conf.php");
	if(isset($_GET['page'])){
		$per_page = ($_GET['page']-1)*12;
		$sql = "SELECT * FROM products order by Public desc limit $per_page, 12";
	}
	else if(isset($_GET['query'])){
		$query = $_GET['query'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Type like '%$query%' or Price like '%$query%' or Size like '%$query%' order by Public desc limit 0, 12";
	}
	else if (isset($_GET['view'])) {
		$type = $_GET['view'];
		$sql = "SELECT * FROM products WHERE Type = '$type' order by Public desc limit 0, 12";
	}
	else if(isset($_GET['p']) && isset($_GET['type'])){
		$num = ($_GET['p']-1)*12;
		$type = $_GET['type'];
		$sql = "SELECT * FROM products WHERE Type = '$type' order by Public desc limit $num, 12";
	}
	else if(isset($_GET['key_search']) && isset($_GET['p_selected'])){
		$query = $_GET['key_search'];
		$type = $_GET['p_selected'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Size like '%$query%' or Color like '%$query%' or Price like '%$query%' AND Type='$type' limit 0, 12";
	}
	else if(isset($_GET['select'])){
		$sql = "SELECT * FROM products WHERE Type='".$_GET['select']."' order by Public desc limit 0, 12 ";
	}
	else{
		$sql = "SELECT * FROM products order by Public desc limit 0, 12";
	}
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
	        <div class="col-lg-2">
	        	<div class="slide-item">
					<img class="thumb" src="../img/<?= $row['image'] ?>">
					<div style="position:relative;">
						<span class="summary">
							<i class="fa fa-edit" id="pEdit" data-toggle="modal" data-target="#myModal"></i>
							<i class="fa fa-trash" id="pDelete"></i>
							<i class="fa fa-info-circle" data-toggle="modal" data-target="#detail" id="info"></i>
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