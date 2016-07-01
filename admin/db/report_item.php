<table class="table table-ordered table-hover table-striped">
	<tr>
		<th>ID</th>
		<th>Quality</th>
		<th>Price</th>
		<th>Date of Sales</th>
		<th>Action</th>
	</tr>
<?php
	include_once("conf.php");
	$page = 0;
	if(isset($_GET['pID'])){
		$page = ($_GET['pID']-1)*6;
		$sql = "SELECT ID, count(Quality) Quality, Price, Sales_at FROM sales group by ID  order by Sales_at desc limit $page, 6";
	}
	else{
		$sql = "SELECT ID, Quality, Price, Sales_at FROM sales  order by Sales_at desc limit $page, 6";
	}
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
			<tr>
				<td><?= $row['ID'] ?></td>
				<td><?= $row['Quality'] ?></td>
				<td>$ <?= $row['Price'] ?></td>
				<td><?= $row['Sales_at'] ?></td>
				<td>
					<div class="btn-group">
						<!-- <button class="btn btn-success" id="info"><i class="fa fa-info"></i></button> -->
						<button class="btn btn-danger" id="trash"><i class="fa fa-trash"></i></button>
					</div>
				</td>
			</tr>
		<?php
	}
?>
</table>