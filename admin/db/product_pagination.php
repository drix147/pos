<ul class="pagination">
<?php 
	include_once("conf.php");
	if(isset($_GET['select'])){
		$sql = "SELECT * FROM products WHERE Type=".$_GET['select'];
	}
	else if(isset($_GET['query'])){
		$query = $_GET['query'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Type like '%$query%' or Price like '%$query%' or Size like '%$query%'";
	}
	else if(isset($_GET['key_search']) && isset($_GET['p_selected'])){
		$query = $_GET['key_search'];
		$type = $_GET['p_selected'];
		$sql = "SELECT * FROM products WHERE ID like '%$query%' or Name like '%$query%' or Size like '%$query%' or Color like '%$query%' or Price like '%$query%' AND Type='$type'";
	}
	else{
		$sql = "SELECT * FROM products";
	}
	$result = $con->query($sql);
	if($result->num_rows > 12){
		for ($i=0; $i <ceil($result->num_rows/12) ; $i++) { 
			?>
				<li id="<?= $i+1 ?>"><a href=""><?= $i+1 ?></a></li>
			<?php
		}
	}
?>
</ul>