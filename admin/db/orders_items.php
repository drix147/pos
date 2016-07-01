<?php
	include_once("conf.php");
	$sql = "SELECT * FROM orders";
	$tmp = "SELECT sum(Quality*Price) total FROM orders";
	$result = $con->query($sql);
	$total = $con->query($tmp);
	$t = $total->fetch_assoc();
	$i=1;
	if($result->num_rows>0){
		while ($row = $result->fetch_assoc()) {
			?>	
				<tr>
					<td><i id='removeItem'><?= $i ?></i></td>
					<td><?= $row['ID'] ?></td>
					<td align="right"><?= $row['Quality'] ?></td>
					<td align="right">$ <?= $row['Price'] ?></td>
					<td style="display: none;"><?= $row['ordersID'] ?></td>
				</tr>
				
			<?php
			$i++;
		}
		?>
		<?php

		?>	
			<tr style="border-top: 2px solid red;">
				<td>TOTAL</td>
				<td colspan="3" align="right" style="color:red;">
					<h3 style="margin:0px;">$ <?= $t['total'] ?></h3>
				</td>
			</tr>
		<?php
	}else{
		?>
			<tr>
				<td colspan="4">
					<h1 class='text-center' style="color: red;"><i class="fa fa-shopping-cart "></i></h1>
				</td>
			</tr>
			<tr style="border-top: 2px solid red;">
				<td>TOTAL</td>
				<td colspan="3" align="right" style="color:red;">
					<h3 style="margin:0px;">$ 0.00</h3>
				</td>
			</tr>
		<?php
	}
?>

