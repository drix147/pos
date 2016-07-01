$(document).ready(function(){
	$(document).on("click", "#pAdd", function(){
		$("#save").show();
		$("#update").hide();
		$("input[name='file']").show();
		$("#image").hide();
		$("input[name='id']").val("");
		$("input[name='name']").val("");
		$("input[name='price']").val("");
		$("input[name='num']").val("");
		$("select[name='size']").val("S");
		$("select[name='color']").val("Black");
	})
	$("#pagination").load("../db/product_pagination.php");
	setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	$("#product_items").load("../db/product_items.php");


	$(document).on("click", ".pagination li", function(event){
		var view = $("select[name='pselect']").val();
		if(view == "all"){
			$(".pagination").find(".active").removeClass();
			$(this).addClass("active");
			$("#allProducts").load("../db/products_all.php?page="+this.id);
		}
		else if(view != "all"){
			$(".pagination").find(".active").removeClass();
			$(this).addClass("active");
			$("#allProducts").load("../db/products_all.php?type="+view+"&p="+this.id);
		}
		event.preventDefault();
	})

	$("#item-category").load("../db/products_view_selection.php");
	$("#allProducts").load("../db/products_all.php");
	$("#type").load("../db/products_type.php");
	$("#products").on("submit", function(event){
		var id, name, price, quality, figure;
		id 		= $("input[name='id']").val();
		name 	= $("input[name='name']").val();
		price 	= $("input[name='price']").val();
		quality	= $("input[name='num']").val();
		figure 	= $("input[name='file']").val();
		if(id != "" && name != "" && figure != "" && price != "" && quality != ""){
			var options = {
				type 		:"POST",
				url			: $(this).attr("action"),
				data:{
					id		: $("input[name='id']").val(),
					name	: $("input[name='name']").val(),
					size	: $("select[name='size']").val(),
					color	: $("select[name='color']").val(),
					price	: $("input[name='price']").val(),
					num		: $("input[name='num']").val(),
					type	: $("select[name='type']").val(),
					image	: $("input[name='file']").val()
				},
				success		:function(data, status, response){
					if(data != ""){
						alert("This item can't insert into database because of (" +data+"). Please check again !");
					}else{
						setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
						$("#pagination").load("../db/product_pagination.php");
						$("#myModal").modal('hide');
						$("#product_items").load("../db/product_items.php");
						$("#products")[0].reset();
					}
				}
			};
			$(this).ajaxSubmit(options);
			setTimeout(function(){$("#allProducts").load("../db/products_all.php");}, 100);
			return false;
		}
		if(id == ""){
			$("#id-error").fadeIn("slow").html("<sup>*</sup>( ID is required! )");
		}else{
			$("#id-error").fadeOut("slow");
		} 
		if(name == ""){
			$("#name-error").fadeIn("slow").html("<sup>*</sup>( Name is required! )");
		}else{
			$("#name-error").fadeOut("slow");
		}
		if(price == ""){
			$("#price-error").fadeIn("slow").html("<sup>*</sup>( Price is required! )");
		}else{
			$("#price-error").fadeOut("slow");
		}
		if(quality == ""){
			$("#quality-error").fadeIn("slow").html("<sup>*</sup>( Quality is required! )");
		}else{
			$("#query-error").fadeOut("slow");
		}
		event.preventDefault();
	})
	$("#item-category").on('change', function(){
		var view = $("select[name='pselect']").val();
		if(view != "all"){
			$("#allProducts").load("../db/products_all.php?select="+view);
			$("#pagination").load("../db/product_pagination.php?select="+view);
			$("#product_items").load("../db/product_items.php?item="+view);
			setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
		}else{
			$("#allProducts").load("../db/products_all.php");
			$("#pagination").load("../db/product_pagination.php");
			$("#product_items").load("../db/product_items.php");
			setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
		}
	})
	$(document).bind("click", ".slide-item", function(){
		$(".show-modal").load("../db/product_modal.php");
	})

	// search
	// $("#search").keyup(function(event){
	// 	var key_search = this.value;
	// 	var p_selected = $("select[name='pselect']").val();
	// 	var view = $("select[name='pselect']").val();
	// 	if(p_selected == "all"){
	// 		$("#allProducts").load("../db/products_all.php?query="+key_search);
	// 		$("#pagination").load("../db/product_pagination.php?query="+key_search);
	// 		$("#product_items").load("../db/product_items.php?query="+key_search);
	// 		setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
	// 	}else{
	// 		if(this.value == ""){
	// 			$("#allProducts").load("../db/products_all.php?select="+view);
	// 			$("#pagination").load("../db/product_pagination.php?select="+view);
	// 			$("#product_items").load("../db/product_items.php?item="+view);
	// 			setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);	
	// 		}else{
	// 			$("#allProducts").load("../db/products_all.php?key_search="+key_search+"&p_selected="+p_selected);
	// 			$("#pagination").load("../db/product_pagination.php?key_search="+key_search+"&p_selected="+p_selected);
	// 			$("#product_items").load("../db/product_items.php?key_search="+key_search+"&p_selected="+p_selected);
	// 			setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
	// 		}
	// 	}
	// 	event.preventDefault();
	// });
	$(document).on("click", "#pEdit", function(){
		$('body').find(".new").removeClass('new');
		$(this).addClass("new");
		$("#save").hide();
		$("#update").show();
		var dom = $(this).parent().parent().parent().children().eq(2).children();
		$("input[name='id']").val(dom.eq(0).text());
		$("input[name='name']").val(dom.eq(1).text());
		$("input[name='price']").val(dom.eq(4).text());
		$("input[name='num']").val(dom.eq(5).text());
		$("select[name='size']").val(dom.eq(2).text());
		$("select[name='color']").val(dom.eq(3).text());
		$("select[name='type']").val(dom.eq(6).text());
		$("input[name='file']").hide();
		$("#image").show();
		$("#image").val(dom.eq(7).text());
	})
	$(document).on("click", "#pDelete", function(){
		oldID 	= $(this).parent().parent().parent().children().eq(2).children().eq(0).text();
		image 	= $(this).parent().parent().parent().children().eq(2).children().eq(7).text();
		if(confirm("Do you want to remove this item?") == true){
			$.ajax({
				type 	: "POST",
				url		: "../db/products_save.php",
				data 	:{
						dID	: oldID,
						img : image
				},
				success:function(data){
					if(data != ""){
						alert(data);
					}
					else{
						setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
						$("#pagination").load("../db/product_pagination.php");
						setTimeout(function(){$("#allProducts").load("../db/products_all.php");}, 100);
						$("#product_items").load("../db/product_items.php");
						$("#item-category").load("../db/products_view_selection.php");
					}
				}
			})
		}
	})

	// update 
	$(document).on("click", "#update", function(event){
		var id, name, price, quality, figure;
		id 		= $("input[name='id']").val();
		name 	= $("input[name='name']").val();
		price 	= $("input[name='price']").val();
		quality	= $("input[name='num']").val();
		oldID 	= $(".new").parent().parent().parent().children().eq(2).children().eq(0).text();
		if(id != "" && name != "" && price != "" && quality != ""){
			var options = {
				type 		:"POST",
				url			: "../db/products_save.php",
				data:{
					uid		: $("input[name='id']").val(),
					uname	: $("input[name='name']").val(),
					usize	: $("select[name='size']").val(),
					ucolor	: $("select[name='color']").val(),
					uprice	: $("input[name='price']").val(),
					unum	: $("input[name='num']").val(),
					utype	: $("select[name='type']").val(),
					image	: $("#image").val(),
					oid     : oldID
				},
				success		:function(data, status, response){
					if(data != ""){
						alert("This item can't update in the database because of (" +data+"). Please check again !");
					}else{
						alert("You've updated this item.");
						setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 100);
						$("#pagination").load("../db/product_pagination.php");
						$("#myModal").modal('hide');
						$("#product_items").load("../db/product_items.php");
						$("#item-category").load("../db/products_view_selection.php");
						$("#products")[0].reset();
					}
				}
			};
			$(this).ajaxSubmit(options);
			setTimeout(function(){$("#allProducts").load("../db/products_all.php");}, 100);
			return false;
		}
		if(id == ""){
			$("#id-error").fadeIn("slow").html("<sup>*</sup>( ID is required! )");
		}else{
			$("#id-error").fadeOut("slow");
		} 
		if(name == ""){
			$("#name-error").fadeIn("slow").html("<sup>*</sup>( Name is required! )");
		}else{
			$("#name-error").fadeOut("slow");
		}
		if(price == ""){
			$("#price-error").fadeIn("slow").html("<sup>*</sup>( Price is required! )");
		}else{
			$("#price-error").fadeOut("slow");
		}
		if(quality == ""){
			$("#quality-error").fadeIn("slow").html("<sup>*</sup>( Quality is required! )");
		}else{
			$("#query-error").fadeOut("slow");
		}
		if(figure == ""){
			$("#file-error").fadeIn("slow").html("<sup>*</sup>( Figure is required! )");
		}else{
			$("#file-error").fadeOut("slow");
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
})
