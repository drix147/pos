<?php 
	include_once("conf.php");
	$result = false;
	if(isset($_POST['id'])){
		if(isset($_POST['name'])){
			if(isset($_POST['size'])){
				if(isset($_POST['color'])){
					if(isset($_POST['price'])){
						if(isset($_POST['num'])){
							if(isset($_POST['type'])){
								if(isset($_POST['image'])){
									$sql = "INSERT INTO products (ID, Name, Size, Color, Price, Numbers, Public, Type, image) VALUES ('".$_POST['id']."', '".$_POST['name']."', '".$_POST['size']."', '".$_POST['color']."', '".$_POST['price']."', '".$_POST['num']."', now(), '".$_POST['type']."', '".$_POST['image']."')";
									$result=$con->query($sql);
									if($result == true){
										if($_FILES['file']['tmp_name']){
											move_uploaded_file($_FILES['file']['tmp_name'], '../img/'.$_FILES['file']['name']);
										}
									}else{
										echo $con->error;
									}
								}
							}
						}
					}
				}
			}
		}
	}
	if(isset($_POST['uid'])){
		if(isset($_POST['uname'])){
			if(isset($_POST['usize'])){
				if(isset($_POST['ucolor'])){
					if(isset($_POST['uprice'])){
						if(isset($_POST['unum'])){
							if(isset($_POST['utype'])){
								if(isset($_POST['image'])){
									$sql = "UPDATE products set ID = '".$_POST['uid']."', Name = '".$_POST['uname']."', Size = '".$_POST['usize']."', Color = '".$_POST['ucolor']."', Price = '".$_POST['uprice']."', Numbers = '".$_POST['unum']."', Type = '".$_POST['utype']."' WHERE ID = '".$_POST['oid']."'";
									$result = $con->query($sql);
									if($result != true){
										echo $con->error;
									}
								}
							}
						}
					}
				}
			}
		}
	}
	if(isset($_POST['dID'])){
		if(isset($_POST['img'])){
			$sql = "DELETE FROM products WHERE ID = '".$_POST['dID']."'";
			$result = $con->query($sql);
			if($result == true){
				$file = "../img/".$_POST['img'];
				unlink($file);
			}else{
				echo $con->error;
			}
		}
	}
?>
