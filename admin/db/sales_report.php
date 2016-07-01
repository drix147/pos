<?php
	include_once("conf.php");
	$date = $_GET['year']."-".$_GET['month']."-".$_GET['day'];
	if(isset($date)){
		$sql = "SELECT ID, count(Quality) Quality, Price, Sales_at FROM sales WHERE Sales_at='$date' group by ID";
		$to = "SELECT ID, sum(Quality*Price) total FROM sales WHERE Sales_at='$date'";
	}
	else{
		$sql = "SELECT ID, count(Quality) Quality, Price, Sales_at FROM sales group by ID";
	}
	$result = $con->query($sql);
	$total = $con->query($to);
	$res = $total->fetch_assoc();
	if($result->num_rows > 0){

		?>
			<table cellpadding="0" cellspacing="0" border="1" width="100%" id="blockPrint">
				<tr style="background: #3173A2; color: #FFF;">
					<th>ID</th>
					<th>Quality</th>
					<th align="right">Price</th>
				</tr>
		<?php
		while ($row = $result->fetch_assoc()) {
		?>
			<tr>
				<td><?= $row['ID'] ?></td>
				<td><?= $row['Quality'] ?></td>
				<td align="right"><span style="float: left;">$</span> <?= $row['Price'] ?></td>
			</tr>
		<?php
		}
	?>
		<tr>
			<td align="right">Total</td>
			<td align="right" colspan="2" style="background: yellow; color: red;">$ <?= $res['total'] ?></td>
		</tr>
	<?php
	}
	else{
		echo "No salling this day !";
	}
?>
</table>