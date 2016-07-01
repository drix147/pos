<?php
	session_start();
	if(!isset($_SESSION["user"])){
		header("Location: ../index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="datatable/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
	            <a class="navbar-brand" href="./">POS System</a>
	        </div>
	        <div class="collapse navbar-collapse" id="menu">
	            <ul class="nav navbar-nav">
	                <li class="active"><a href="./index.php"><i class="fa fa-home"></i></a></li>
	                <li><a href="page/category.php">Category</a></li>	 
	                <li><a href="page/products.php">Products</a></li>               
	                <li><a href="#"><span id="time"></span></a></li>
	            </ul>
	            <a href="page/sales.php">
		            <button type="button" class="btn btn-warning navbar-btn">
		            	Sales
		            </button>
	            </a>
	            <a href="page/report.php">
	            	<button type="button" class="btn btn-danger navbar-btn">Report</button>
	            </a>
	            <a href="page/recent.php"><button type="button" class="btn btn-success navbar-btn">Today's sale</button></a>
	            <ul class="nav navbar-nav navbar-right">
	            	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?= $_SESSION['user'] ?></a>
			          <ul class="dropdown-menu">
			            <li>
			            	<a href="logout.php">
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
					<h3 class="box-title">Category</h3>
					<div class="box-tools pull-right">
						<i class="fa fa-minus"></i>
					</div>
				</div>
				<div class="box-body">
					<div class="content" style="width: 100%;">
					
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Product</h3>
					<div class="box-tools pull-right">
						<i class="fa fa-minus"></i>
					</div>
				</div>
				<div class="box-body">
					<div class="sales" style="width: 100%;">
					
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Salle</h3>
					<div class="box-tools pull-right">
						<i class="fa fa-minus"></i>
					</div>
				</div>
				<div class="box-body">
					<div class="newProducts" style="width: 100%;">
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid footer">
		<article class="text-center">Copyright &copy; 2016 POS System v.1.0 ITC</article>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="datatable/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/time.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-3d.js"></script>
	<script src="js/exporting.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click", ".fa.fa-plus", function(){
				$(this).removeClass("fa fa-plus").addClass("fa fa-minus");
				$(this).parent().parent().parent().find(".box-body").slideDown();
			})
			$(document).on("click", ".fa.fa-minus", function(){
				$(this).removeClass("fa fa-minus").addClass("fa fa-plus");
				$(this).parent().parent().parent().find(".box-body").slideUp();
			})
		})
	</script>
	<script type="text/javascript">
		$(function () {
		    $('.content').highcharts({
		        chart: {
		            type: 'column',
		            options3d: {
		                enabled: true,
		                alpha: 10,
		                beta: 25,
		                depth: 70
		            }
		        },
		        title: {
		            text: 'Categories'
		        },
		        subtitle: {
		            text: 'Man, Woman, Children'
		        },
		        plotOptions: {
		            column: {
		                depth: 25
		            }
		        },
		        xAxis: {
		            title:{
		                text: ""
		            },
		            categories: ["Man", "Woman", "Children"]
		        },
		        yAxis: {
		            title: {
		                text: ""
		            }
		        },
		        series: [{
		            name: 'Categories',
		            data: [200, 320, 300]
		            }
		        ]
		    });
		    $('.sales').highcharts({
		        chart: {
		            type: 'column',
		            options3d: {
		                enabled: true,
		                alpha: 10,
		                beta: 25,
		                depth: 70
		            }
		        },
		        title: {
		            text: 'Products'
		        },	
		        plotOptions: {
		            column: {
		                depth: 25
		            }
		        },
		        xAxis: {
		            title:{
		                text: "Man, Woman, Children"
		            },
		            categories: ["Man", "Woman", "Children"]
		        },
		        yAxis: {
		            title: {
		                text: ""
		            }
		        },
		        series: [{
		            name: 'Sales',
		            data: [200, 320, 300]
		            }
		        ]
		    });
		    $('.newProducts').highcharts({
		        chart: {
		            type: 'column',
		            options3d: {
		                enabled: true,
		                alpha: 10,
		                beta: 25,
		                depth: 70
		            }
		        },
		        title: {
		            text: 'Salles'
		        },
		        subtitle: {
		            text: 'Man, Woman, Children'
		        },
		        plotOptions: {
		            column: {
		                depth: 25
		            }
		        },
		        xAxis: {
		            title:{
		                text: ""
		            },
		            categories: ["Man", "Woman", "Children"]
		        },
		        yAxis: {
		            title: {
		                text: ""
		            }
		        },
		        series: [{
		            name: 'Salle',
		            data: [200, 320, 300]
		            }
		        ]
		    });
		});
	</script>
</body>
</html>