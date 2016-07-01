<?php 
	include_once("../db/conf.php");
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: ../../index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="../">POS System</a>
	        </div>
	        <div class="collapse navbar-collapse" id="menu">
	            <ul class="nav navbar-nav">
	                <li><a href="../"><i class="fa fa-home"></i></a></li>
	                <li class="active"><a href="category.php">Category</a></li>	 
	                <li><a href="products.php">Products</a></li>               
	                <li><a href="#"><span id="time"></span></a></li>
	            </ul>
	            <a href="sales.php">
		            <button type="button" class="btn btn-warning navbar-btn">
		            	Sales
		            </button>
	            </a>
	            <a href="report.php">
	            	<button type="button" class="btn btn-danger navbar-btn">Report</button>
	            </a>
	            <a href="recent.php"><button type="button" class="btn btn-success navbar-btn">Today's sale</button></a>
	            <ul class="nav navbar-nav navbar-right">
	            	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?= $_SESSION['user'] ?></a>
			          <ul class="dropdown-menu">
			            <li>
			            	<a href="../logout.php">
			            		<i class="fa fa-sign-out icon"></i>
			            		Sign Out
			            	</a>
			            </li>
			          </ul>
			        </li>
	            </ul>
	        </div>
	    </div>
	</nav>
	<div class="container">
		<div class="col-lg-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">
						<h3 class="box-title">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="pAdd"><i class="fa fa-plus"></i> ADD NEW CATEGORY</button>
					</h3>
					</h3>
					<div class="box-tools pull-right">
						<form action="" method="POST" class="form-inline">
							<input type="text" class="form-control" placeholder="SEARCH CATEGORY" id="search" name="search">
							<button class="btn btn-primary">SEARCH</button>
						</form>
					</div>
				</div>
				<div class="box-body">
					<div id="content"></div>
				</div>
				<div class="box-footer with-border">
					<p class="box-title">All of Category <span class="badge badge-success">
					</span> <span id="search_item" style="display: none;" class="badge"></span> Items.</p>
					<div class="box-tools pull-right">
						<span id="pagination"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true"><i class="fa fa-remove"></i></span>
        			</button>
        			<h4 class="modal-title" id="myModalLabel">ADD NEW CATEGORY</h4>
      			</div>
      			<div class="modal-body">
      				<div id="message" style="display: none;"></div>
      				<form action=""  id="category" method="POST">
						<div class="form-group">
							<label for="id">CATEGORY ID</label>
							<input type="text" id="id" name="id" class="form-control message" placeholder="CATEGORY ID">
							<span id="id-error"></span>
						</div>
						<div class="form-group">
							<label for="name">CATEGORY NAME</label>
							<input type="text" id="name" name="name" class="form-control message" placeholder="CATEGORY NAME">
							<span id="name-error"></span>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Save" id="save" class="btn btn-primary btn-block">
						</div>
					</form>
      			</div>
    		</div>
  		</div>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true"><i class="fa fa-remove"></i></span>
        			</button>
        			<h4 class="modal-title" id="myModalLabel">UPDATE CATEGORY</h4>
      			</div>
      			<div class="modal-body">
      				<div id="message" style="display: none;"></div>
      				<form action=""  id="editCategoryForm" method="POST">
						<div class="form-group">
							<label for="id">CATEGORY ID</label>
							<input type="text" id="id" name="id" class="form-control message" placeholder="CATEGORY ID" disabled>
							<span id="id-error"></span>
						</div>
						<div class="form-group">
							<label for="name">CATEGORY NAME</label>
							<input type="text" id="name" name="name" class="form-control message" placeholder="CATEGORY NAME">
							<span id="name-error"></span>
						</div>
						<div class="form-group">
							<input type="button" value="Update" id="update" class="btn btn-info btn-block">
						</div>
					</form>
      			</div>
    		</div>
  		</div>
	</div>
	<div class="container-fluid footer">
		<article class="text-center">Copyright &copy; 2016 POS System v.1.0 ITC</article>
	</div>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/time.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.js"></script>
	<script type="text/javascript" src="../js/datetime.js"></script>
	<script type="text/javascript" src="../js/category.js"></script>
</body>
</html>