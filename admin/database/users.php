<?php
	$con = new mysqli("localhost", "root", "", "TP10");
	if(isset($_POST['fname'])){
		if(isset($_POST['lname'])){
			if(isset($_POST['phone'])){
				if(isset($_POST['gmail'])){
					if(isset($_POST['intrests'])){
						if(isset($_POST['blood'])){
							$sql = "INSERT INTO resgister (fname, lname, phone, gmail, slug, blood) VALUES('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['phone']."', '".$_POST['gmail']."', '".$_POST['intrests']."', '".$_POST['blood']."')";
							$con->query($sql);
						}
					}
				}
			}
		}
	}
	$con->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TP10</title>
	<link rel="stylesheet" type="text/css" href="./../bootstrap/bootstrap.min.css">
	<style type="text/css">
		.blue{color:blue;}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-lg-12">
			<article>
				Hi <span class="blue"><?= $_POST['fname'] ?></span> ! Thank you completing the survey.<br/>
				You have been added to the <span class="blue"><?= $_POST['intrests'] ?></span> mailing list.<br/><br/>
				<b>The following information have been saved in ours database.</b>
			</article>
			<table class="table table-bordered table-hover">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Blood Type</th>
				</tr>
				<?php
					$con = new mysqli("localhost", "root", "", "TP10");
					$sql = "SELECT * FROM resgister order by id desc";
					$res = $con->query($sql);
					while ($row = $res->fetch_assoc() ) {
						?>
							<tr>
								<td><?= $row['fname']." ".$row['lname'] ?></td>
								<td><?= $row['gmail']?></td>
								<td><?= $row['phone'] ?></td>
								<td><?= $row['blood'] ?></td>
							</tr>
						<?php
					}
					$con->close();
				?>
			</table>
			<article class="text-right">This is a simple form. You have not been added to a mailing list.</article>
		</div>
	</div>
</body>
</html>