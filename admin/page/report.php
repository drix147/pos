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
	<title>Report</title>
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
	                <li><a href="category.php">Category</a></li>	 
	                <li><a href="products.php">Products</a></li>               
	                <li><a href="#"><span id="time"></span></a></li>
	            </ul>
	            <a href="sales.php"><button type="button" class="btn btn-warning navbar-btn">Sales</button></a>
	            <a href="report.php"><button type="button" class="btn btn-danger navbar-btn">Report</button></a>
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
		<div class="col-lg-4">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Report</h3>
				</div>
				<div class="box-body">
					<form class="form-horizontal"> 
						<label>Start Date</label>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Year</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="year" placeholder="Year">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Month</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="month" placeholder="Month">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Day</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="day" placeholder="Day">
					    	</div>
					  	</div>
					  	<label>TO</label>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Year</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="year" placeholder="Year">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Month</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="month" placeholder="Month">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputEmail3" class="col-sm-2 control-label">Day</label>
					    	<div class="col-sm-10">
					      		<input type="email" class="form-control" name="day" placeholder="Day">
					    	</div>
					  	</div>
					  	<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button class="btn btn-primary" id="re" data-toggle="modal" data-target="#preview">Preview
						      	</button>
						    </div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Lists Porducts Salles</h3>
				</div>
				<div class="box-body">
					<div id="report"></div>
				</div>
				<div class="box-footer with-border">
					<p class="footer-title">Products are salled !</p>
					<div class="box-tools pull-right">
						<div id="pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal priview -->
	<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">MONTHLY REPORT</h4>
	      		</div>
	      		<div class="modal-body">
	        		<div id="print"></div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary" id="eprint"><i class="fa fa-print"></i></button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<div class="modal fade" id="infov" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">MONTHLY REPORT</h4>
	      		</div>
	      		<div class="modal-body">
	        		<div id="print"></div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary" id="eprint"><i class="fa fa-print"></i></button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<div class="container-fluid footer">
		<article class="text-center">Copyright &copy; 2016 POS System v.1.0 ITC</article>
	</div>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/time.js"></script>
	<script type="text/javascript" src="../js/report.js"></script>
</body>
</html>