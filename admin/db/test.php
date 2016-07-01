<?php
	echo $_POST['id'];


?>
<table cellpadding="0" cellspacing="0" border="1" width="100%" id="reportPrint">
	<tr style="background: #3173A2; color: #FFF;">
		<th>ID</th>
		<th>Quality</th>
		<th align="right">Price</th>
	</tr>
<?php
	include_once("conf.php");
	$sql = "SELECT ID, count(Quality) Quality, Price, Sales_at FROM sales group by ID";
	$result = $con->query($sql);
	echo $_POST['id'];
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
			<td align="right" colspan="2" style="background: yellow; color: red;">$ 99.009</td>
		</tr>
	<?php
?>
</table>