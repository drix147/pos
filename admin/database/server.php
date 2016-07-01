<?php 
	$con = new mysqli("localhost", "root", "", "POS");
	if(isset($_POST['id'])){
		if(isset($_POST['name'])){
			$sql = "INSERT INTO category (ID, Name, Public) VALUES('".$_POST['id']."', '".$_POST['name']."',now())";
			$result = $con->query($sql);
			if($result == true){
				echo "true";
			}
			else{
				echo "<div class='alert alert-danger'>".$con->error."</div>";
			}
		}
	}
	if(isset($_POST['idDelete'])){
		if(isset($_POST['nameDelete'])){
			$sql = "DELETE FROM category WHERE id='".$_POST['idDelete']."' AND name='".$_POST['nameDelete']."'";
			$result = $con->query($sql);
			if($result == true){
				echo "true";
			}
			else{
				echo $con->error;
			}
		}
	}
	if(isset($_POST['idUpdate'])){
		$sql = "UPDATE category set name='".$_POST['name']."' WHERE id='".$_POST['idUpdate']."'";
		$result = $con->query($sql);
		if($result == true){
			echo "true";
		}else{		
			echo "<div class='alert alert-success'>You can't update recorde because ".$con->error."</div>";
		}
	}
	if(isset($_FILES['file']['tmp_name'])){
		move_uploaded_file($_FILES['file']['tmp_name'], "img/".$_FILES['file']['name']);
	}
	$con->close();
?>