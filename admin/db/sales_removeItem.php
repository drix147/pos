<?php
	include_once("conf.php");
	if(isset($_POST['id']) && isset($_POST['num']) && isset($_POST['oid'])){
		$sql1 = "DELETE FROM orders WHERE ordersID='".$_POST['oid']."'";
		$result1 = $con->query($sql1);
		if($result1 == true){
			$sql2 = "UPDATE products set Numbers=Numbers+'".$_POST['num']."' WHERE ID='".$_POST['id']."'";
			$result2 = $con->query($sql2);
			if($result2 == true){
				echo "success";
			}else{
				echo $con->error;
			}
		}else{
			echo $con->error;
		}
	}else{
		echo "Error !";
	}
?>