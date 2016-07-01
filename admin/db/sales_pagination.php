<ul class="pagination">
<?php 
	include_once("conf.php");
	if(isset($_GET['search'])){
		$key = $_GET['search'];
		$sql = "SELECT * FROM products WHERE ID like '%&key%' or Name like '%key%' or Price like '%$key%' or Color like '%$key%' or Size like '%$key%'";
	}else{
		$sql = "SELECT * FROM products";
	}
	$result = $con->query($sql);
	if($result->num_rows>8){
		for ($i=0; $i <ceil($result->num_rows/8) ; $i++) { 
			?>
				<li id="<?= $i+1 ?>"><a href=""><?= $i+1 ?></a></li>
			<?php
		}
	}
?>
</ul>