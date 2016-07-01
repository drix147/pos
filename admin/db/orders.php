<?php 
	include_once("conf.php");
	if(isset($_POST['id']) && isset($_POST['num']) && isset($_POST['price'])){
		$sql = "SELECT Numbers FROM products WHERE ID = '".$_POST['id']."'";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		if($row['Numbers'] >= $_POST['num'] && $_POST['num'] > 0){
			$tmp = $row['Numbers'] - $_POST['num'];
			$sql_p = "UPDATE products set Numbers='$tmp' WHERE ID='".$_POST['id']."'";
			$result_p = $con->query($sql_p);
			if($result_p == true){
				$sql_o = "INSERT INTO orders (ID, Quality, Price, Sales_at) VALUES ('".$_POST['id']."', '".$_POST['num']."', '".$_POST['price']."', now())";
				$result_o = $con->query($sql_o);
				if($result_o == true){
					echo "success";
				}else{
					echo $con->error;
				}
			}else{
				echo $con->error;
			}
		}else{
			echo "You can't buy this item. It's has ".$row['Numbers'].".";
		}
	}

?>