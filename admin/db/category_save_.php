<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Clothes</th>
		<th>Action</th>
	</tr>
<?php 
	include_once("../db/conf.php");
	$sql = "SELECT * FROM category order by Public desc limit 0,5";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		?>
			<tr>
				<td><?= $row['ID'] ?></td>
				<td><?= $row['Name'] ?></td>
				<td><?= $row['Public'] ?></td>
				<td>
					<button id="categoryEdit" class="btn btn-info" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
					<button id="categoryDelete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php
	}
?>
</table>