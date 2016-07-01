 <?php 
 	include_once("conf.php");
 	$sqlOrder = "SELECT ID, Quality FROM orders";
 	$resultOrder = $con->query($sqlOrder);
 	while ($row = $resultOrder->fetch_assoc()){
 		$sqlProduct = "UPDATE products set Numbers=Numbers+'".$row['Quality']."' WHERE ID='".$row['ID']."'";
 		$resultProduct = $con->query($sqlProduct);
 	}
 	$sqlDropTable = "DELETE FROM orders";
 	$con->query($sqlDropTable);
 ?>