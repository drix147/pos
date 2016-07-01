<?php 
	include_once("conf.php");
	$query = $_POST['query'];
	$sql = "SELECT * FROM category WHERE ID like '%$query%' or Name like '%$query%' limit 0,5";
	$result = $con->query($sql);
	if($result->num_rows >0){
?>
<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Public</th>
		<th>Action</th>
	</tr>
	<?php
		while ($row = $result->fetch_assoc()) {
			?>
				<tr>
					<td><?= $row['ID'] ?></td>
					<td><?= $row['Name'] ?></td>
					<td><?= $row['Public'] ?></td>
					<td>
						<button class="btn btn-info" id='categoryEdit'><i class="fa fa-pencil"></i></button>
						<button class="btn btn-danger" id='categoryDelete'><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php
		}
	?>
</table>
<?php
	}
	else{
		echo "<article>No result 0 items.</article>";
	}
?>