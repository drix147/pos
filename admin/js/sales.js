$(document).ready(function(){
	$("#sales").load("../db/sales_item.php");
	$("#pagination").load("../db/sales_pagination.php");
	$("#productItem").load("../db/orders_items.php");
	setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);

	$(document).on("click", ".pagination li", function(event){
		if($("#search").val() != ""){
			$(".pagination").find(".active").removeClass();
			$(this).addClass("active");
			$("#sales").load("../db/sales_item.php?page="+this.id+"&query="+$("#search").val());
		}else{
			$(".pagination").find(".active").removeClass();
			$(this).addClass("active");
			$("#sales").load("../db/sales_item.php?page="+this.id);
		}
		event.preventDefault();
	})

	$(document).on("click", "#info", function(event){
		var dom = $(this).parent().parent().parent().children().eq(2).children();
		$("#id").text(dom.eq(0).text());
		$("#name").text(dom.eq(1).text());
		$("#size").text(dom.eq(2).text());
		$("#color").text(dom.eq(3).text());
		$("#price").text(dom.eq(4).text());
		$("#num").text(dom.eq(5).text());
		$("#t").text(dom.eq(6).text());
		$("#img").html('<img src="../img/'+dom.eq(7).text()+'" class="img-responsive"/>');
		event.preventDefault();
	})
	// $("#search").keyup(function(){
	// 	if(this.value != ""){
	// 		$("#sales").load("../db/sales_item.php?search="+this.value);
	// 		$("#pagination").load("../db/sales_pagination.php?search="+this.value);
	// 		setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	// 	}else{
	// 		$("#sales").load("../db/sales_item.php");
	// 		$("#pagination").load("../db/sales_pagination.php");
	// 		setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	// 	}
	// })

	$(document).on("click", "#buy", function(event){
		var dom = $(this).parent().parent().parent().children().eq(2).children();
		$("body").find(".buyings").removeClass("buyings");
		$(this).parent().parent().parent().addClass("buyings");
		$("#b-img").html('<img src="../img/'+dom.eq(7).text()+'" class="img-responsive"/>');
		$("input[name='bID']").val(dom.eq(0).text());
		$("input[name='bprice']").attr("placeholder", "$ "+dom.eq(4).text());
		$("#n").text("This product has "+  dom.eq(5).text()+" items.");
		event.preventDefault();
	})
	$(document).on("click", "#add", function(event){
		var i = $("#item").text();
		var total = $("#total").text();
		var num = $("input[name='bnum']").val();
		var id = $("input[name='bID']").val();
		var price = $(".buyings").children().eq(2).children().eq(4).text();
		if($("input[name='bnum']").val() != ""){
			$.ajax({
				type		:"POST",
				url			: "../db/orders.php",
				data		: {
					id 		: id,
					num 	: num,
					price 	: price
				},
				success		:function(data){
					if(data=="success"){
						$("#productItem").html(data);
						$("#buying").modal("hide");
						$("#buys")[0].reset();
						$("#sales").load("../db/sales_item.php");
						$("#productItem").load("../db/orders_items.php");
					}else{
						alert(data);
					}
				}
			})
		}else{
			alert("Something went wrong !");
		}
		event.preventDefault();
	})
	$(document).on("click", "#removeItem", function(){
		$.ajax({
			type:"POST",
			url:"../db/sales_removeItem.php",
			data:{
				id:$(this).parent().next().text(),
				num:$(this).parent().next().next().text(),
				oid:$(this).parent().next().next().next().next().text()
			},
			success:function(data, status){
				if(status == "success"){
					$("#productItem").load("../db/orders_items.php");
					$("#sales").load("../db/sales_item.php");
				}else{
					alert(data);
				}
			}
		})
	})

	$(document).on("click", "#agree", function(){
		var printContents = $("#print").html();
    	var originalContents = $("body").html();
     	document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		$.ajax({
			type:"POST",
			url:"../db/sales_order.php",
			success:function(data, status){
				if(status == "success"){
					$("#sales").load("../db/sales_item.php");
					$("#productItem").load("../db/orders_items.php");
					alert("Thanks you for you shopping!");
				}
			}
		})
	})
	$(document).on("click", '#cancel', function(){
		$.ajax({
			type:"POST",
			url:"../db/sales_cancel.php",
			success:function(data, status){
				$("#cancel").attr("disabled", "true");
				if(status == "success"){
					setTimeout(function(){
						$("#cancel").removeAttr("disabled");
					}, 1000);
					$("#sales").load("../db/sales_item.php");
					$("#productItem").load("../db/orders_items.php");
				}
			}
		})
	})
})