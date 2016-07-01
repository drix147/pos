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
	<title>Sales</title>
	<meta charset="UTF-8">
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
			<div id="load"></div>
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Welcome To POS's ITC</h3>
					<div class="box-tools pull-right">
						<i class="fa fa-minus"></i>
					</div>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<div id="print">
							<table cellspacing="0" cellpadding="6" width="100%" style="margin:0px auto;">
								<tr>
									<td colspan="4" align="center">
										<h3><b>City Super Market</b></h3>
										#234, st 290, Toul Kor, Phnom Penh<br/>
									</td >
								</tr>
								<tr class="head-table">
									<td colspan="2">
										<b>Project</b><br/>
										Invoice ID<br/>
										Invoice Date<br/>
										Email<br/>
										Phone	
									</td>
									<td colspan="2" align="right">
										<b>Website Design</b><br/>
										AC-106<br/>
										11/28/08<br/>
										mabhelitc@gmail.com<br/>
										(+855) 65 52 631
									</td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr style="background:#3173A2;color:white;border-bottom:1px solid black;">
									<th><!-- <i class="fa fa-remove"></i> -->No</th>
									<th>Product</th>
									<th align="right">Quality</th>
									<th align="right">Price</th>
								</tr>
								<tbody id="productItem">
									
								</tbody>
								<tr align="center">
									<td colspan="5">Thanks you for your coming.<br>Visite again.</td>
								</tr>
							</table>
						</div>
						<div class="btn-group btn-group-justified">
						  	<div class="btn-group" role="group">
						    	<button class="btn btn-primary" id="agree">Agree</button>
						  	</div>
						  	<div class="btn-group" role="group">
						    	<button class="btn btn-warning" id="cancel">Cancel</button>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">
						Lists all of products
					</h3>
					<div class="box-tools pull-right">
						<form class="form-inline">
							<span id="item-category" class="box-title"></span>
							<input type="text" placeholder="SEARCH PRODUCTS" class="form-control" id="search">
							<button class="btn btn-primary">SEARCH</button>
						</form>
					</div>
				</div>
				<div class="box-body">
					<div id="sales"></div>
				</div>
				<div class="clearfix"></div>
				<div class="box-footer with-border">
					<p class="box-title">All of products <span id="sales_items" class="badge badge-success"></span> Items.</p>
					<div class="box-tools pull-right">
						<span id="pagination"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="buying" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true"><i class="fa fa-remove"></i></span>
        			</button>
        			<h4 class="modal-title" id="myModalLabel">BUYING PRODCUTS</h4>
      			</div>
      			<div class="modal-body">
      				<div class="col-lg-5">
  						<div id="b-img"></div>
  					</div>
  					<div class="col-lg-7" style="padding:0px;">
  						<div class="box box-success">
  							<div class="box-header with-border">
  								<h3 class="box-title">INFOMATION OF PRODUCT</h3>
  							</div>
  							<div class="box-body">
  								<form class="form" id="buys">
  									<div class="form-group">
  										<label>Product ID</label>
  										<input type="text" name="bID" class="form-control" disabled>
  									</div>
  									<div class="form-group">
  										<label>Price</label>
  										<input type="text" name="bprice" class="form-control" disabled>
  									</div>
  									<div class="form-group">
  										<label>Promotion</label>
  										<input type="text" name="beknum" class="form-control">
  									</div>
  									<div class="form-group">
  										<label>Quality</label>
  										<input type="text" name="bnum" class="form-control">
  										<p id="n"></p>
  									</div>
  								</form>
  							</div>
  						</div>
  					</div>
  					<div class="clearfix"></div>
      			</div>
      			<div class="modal-footer" style="background: #EEE;">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
	        		<button type="button" class="btn btn-primary" id="add">ADD TO CHART</button>
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
        			<h4 class="modal-title" id="myModalLabel">PRODUCTS DETAIL</h4>
      			</div>
      			<div class="modal-body">
      				<div class="col-lg-5">
  						<div id="img"></div>
  					</div>
  					<div class="col-lg-7" style="padding:0px;">
  						<div class="box box-success">
  							<div class="box-header with-border">
  								<h3 class="box-title">INFOMATION OF PRODUCT</h3>
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
      			</div>
    		</div>
  		</div>
	</div>
	<div class="container-fluid footer">
		<article class="text-center">Copyright &copy; 2016 POS System v.1.0 ITC</article>
	</div>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/time.js"></script>
	<script type="text/javascript" src="../js/sales.js"></script>
</body>
</html>