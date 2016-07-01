<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Clothes</th>
		<th>Public</th>
		<th>Action</th>
	</tr>
	<tbody id="categoryTable">
		<?php
			include 'conf.php';
			if(isset($_GET['pages'])){
				$page = ($_GET['pages']-1)*5;
			}else{
				$page = 0;
			}
			$sql = "SELECT * FROM category order by public desc limit $page, 5";
			$res = $con->query($sql);
			while ($col = $res->fetch_assoc()){
		?>
			<tr>
				<td><?= $col['ID'] ?></td>
				<td><?= $col['Name'] ?></td>
				<td><?= $col['Public'] ?></td>
				<td>
					<button class="btn btn-info" id='categoryEdit' data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>
					<button class="btn btn-danger" id='categoryDelete'><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>