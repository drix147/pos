$(document).ready(function(){
	$("#report").load("../db/report_item.php");
	setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	$("#pagination").load("../db/report_pagination.php");
	$("select[name='type']").load("../db/report_type.php");


	$(document).on("click", ".pagination li", function(event){
		$(".pagination").find(".active").removeClass();
		$(this).addClass("active");
		$("#report").load("../db/report_item.php?pID="+this.id);
		event.preventDefault();
	})
	$(document).on("click", "#re", function(event){
		var type = $("select[name='type']").val();
		var year = $("input[name='year']").val();
		var month = $("input[name='month']").val();
		var day = $("input[name='day']").val();
		$("#print").load("../db/sales_report.php?year="+year+"&month="+month+"&day="+day);
		event.preventDefault();
	})
	$(document).on("click", "#eprint", function(){
		var printContents = $(".modal-body").html();
    	var originalContents = $("body").html();
     	document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		location.reload(true);
	})
	$(document).on("click", "#trash", function(){
		if(confirm("Do you want to delete ?")==true){
			$.ajax({
				type:"POST",
				url:"../db/sales_report_item.php",
				data:{
					id:$(this).parent().parent().parent().children().eq(0).text()
				},
				success:function(){
					$("#report").load("../db/report_item.php");
					setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
					$("#pagination").load("../db/report_pagination.php");
				}
			})
		}else{
			alert("Thanks You !");
		}
	})
})