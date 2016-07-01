<?php
	$con = new mysqli("localhost", "TP", "admintp", "POS");
	$sql = "SELECT * FROM admin WHERE username = '".$_POST['username']."'";
	$res = $con->query($sql);
	if($res->num_rows == 1){
		while ($col = $res->fetch_assoc()) {
			if(password_verify($_POST['password'], $col['password'])){
				session_start();
				$_SESSION['user'] = $_POST['username'];
				header("Location: index.php");
				exit;
			}
		}
	}
	header("Location: ../index.php?message=error");
	$con->close();
?>
