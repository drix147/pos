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
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../datatable/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../datatable/dataTables.bootstrap.min.css">
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
	                <li><a href="category.php">Category</a></li>	 
	                <li class="active"><a href="products.php">Products</a></li>               
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
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="pAdd"><i class="fa fa-plus"></i> ADD NEW PRODUCT</button>
					</h3>
					<div class="box-tools pull-right">
						<form class="form-inline">
							<span id="item-category" class="box-title"></span>
							<input type="text" placeholder="Search products..." class="form-control" id="search">
							<button class="btn btn-primary">SEARCH</button>
						</form>
					</div>
				</div>
				<div class="box-body">
					<div id="allProducts"></div>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  						<div class="modal-dialog" role="document">
  							<form id="products" action="../db/products_save.php" method="POST">
	    						<div class="modal-content">
	      							<div class="modal-header">
	        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="icon-close">
	        								<i class="fa fa-remove"></i>
	        							</span></button>
	        							<h4 class="modal-title" id="myModalLabel">ADD NEW PRODUCT</h4>
	      							</div>
		      						<div class="modal-body">
		      							<div id="show-error"></div>
		      							<label>ID</label><span id="id-error"></span>
										<input type="text" name="id" class="form-control">
										<label>Name</label><span id="name-error"></span>
										<input type="text" name="name" class="form-control">
										<label>Size</label>
										<select class="form-control" name="size">
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XS">XS</option>
											<option value="XL">XL</option>
										</select>
										<label>Color</label>
										<select class="form-control" name="color">
											<option value="Black">Black</option>
											<option value="Red">Red</option>
											<option value="Blue">Blue</option>
											<option value="Pink">Pink</option>
											<option value="Gray">Gray</option>
										</select>
										<label>Price <span style="color:#DDD;">($)</span></label><span id="price-error" style="color: red;font-style: italic;font-weight: bold;"></span>
										<input type="text" name="price" class="form-control">
										<label>Quality</label><span id="quality-error" style="color: red;font-style: italic;font-weight: bold;"></span>
										<input type="text" name="num" class="form-control">
										<label>Type</label><span id="type-error"></span>
										<span id="type"></span>
										<label>Figure</label>
										<span id="file-error" style="color:red;font-style:italic;font-weight:bold;"></span>
										<input type="file" name="file" size="100">
										<input type="text" id="image" style="display: none;" disabled class="form-control">
		      						</div>
				      				<div class="modal-footer">
				        				<button class="btn btn-info" style="display: none;" id="update">UPDATE</button>
				        				<input type="submit" value="SAVE" class="btn btn-primary" id="save">
				      				</div>
	    						</div>
    						</form>
  						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="box-footer with-border">
					<p class="box-title">All of products <span id="product_items" class="badge badge-success"></span> Items.</p>
					<div class="box-tools pull-right">
						<span id="pagination"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true"><i class="fa fa-remove"></i></span>
        			</button>
        			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
      			</div>
      			<div class="modal-body">
      				<div class="col-lg-5">
  						<div id="img"></div>
  					</div>
  					<div class="col-lg-7" style="padding:0px;">
  						<div class="box box-success">
  							<div class="box-header with-border">
  								<h3 class="box-title">Detail of Product</h3>
  							</div>
  							<div class="box-body">
  								<table class="table table-bordered">
		  							<tr>
		  								<th>Code</th>
		  								<td id="id">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Name</th>
		  								<td id="name">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Size</th>
		  								<td id="size">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Color</th>
		  								<td id="color">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Price</th>
		  								<td id="price">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Item</th>
		  								<td id="num">F001</td>
		  							</tr>
		  							<tr>
		  								<th>Type</th>
		  								<td id="t">$ 0.00</td>
		  							</tr>
		  						</table>
  							</div>
  						</div>
  					</div>
  					<div class="clearfix"></div>
      			</div>
      			<div class="modal-footer" style="background: #EEE;">
	        		<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary">Save changes</button> -->
      			</div>
    		</div>
  		</div>
	</div>
	<div class="container-fluid footer">
		<article class="text-center">Copyright &copy; 2016 POS System v.1.0 ITC</article>
	</div>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/time.js"></script>
	<script type="text/javascript" src="../js/jquery.form.js"></script>
	<script type="text/javascript" src="../js/products.js"></script>
</body>
</html>