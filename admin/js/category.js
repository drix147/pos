$(document).ready(function(){
	$("#category").bind("submit", function(event){
		id = $("input[name='id']").val();
		name = $("input[name='name']").val();
		if(id != "" && name != ""){
			$("#id-error").html("");
			$("#name-error").html("");
			$.ajax({
				type:"POST",
				url:"../database/server.php",
				data:{
					id:$("input[name='id']").val(),
					name:$("input[name='name']").val()
				},
				success:function(data){
					if(data == "true"){
						$("#myModal").modal('hide');
						$("#content").load("../db/category_save_.php");
						$("#pagination").load("../db/pagination_category_.php");
						setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
					}else{
						$("#message").fadeIn().html(data);
						setTimeout(function(){$("#message").fadeOut();}, 3000);
						setTimeout(function(){$("body").find("#show-error").children().fadeOut();}, 2500);
					}
					$("input[name='id']").val("");
					$("input[name='name']").val("");
				}
			})
		}
		else if(id == "" && name == ""){
			$("#id-error").html("Category id is required");
			$("#name-error").html("Category name is required");
		}
		else if(id == "" && name != ""){
			$("#id-error").html("Category id is required");
			$("#name-error").html("");
		}
		else if(name == "" && id != ""){
			$("#id-error").html("");
			$("#name-error").html("Category name is required");
		}
		event.preventDefault();
	})
	$(document).on("click", "#categoryDelete", function(){
		$("body").find(".rowdelete").removeClass();
		$(this).parent().parent().addClass("rowdelete");
		if(confirm("Do you want to delete this recorde ?") == true){
			$.ajax({
				type:"POST",
				url:"../database/server.php",
				data:{
					idDelete:$(".rowdelete").children().eq(0).text(),
					nameDelete:$(".rowdelete").children().eq(1).text()
				},
				success:function(data){
					if(data == "true"){
						$("#content").load("../db/category_save_.php");
						$("#pagination").load("../db/pagination_category_.php");
						setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
					}else{
						alert(data);
					}
				}
			})
		}else{
			setTimeout(function(){
				$("body").find(".rowdelete").removeClass();
			}, 200);
		}
	})
	$(document).on("click", "#categoryEdit", function(event){
		$("#id-error").html("");
		$("#name-error").html("");
		$("body").find(".rowupdate").removeClass();
		$(this).parent().parent().addClass("rowupdate");
		$("input[name='id']").val($(this).parent().parent().children().eq(0).text());
		$("input[name='name']").val($(this).parent().parent().children().eq(1).text());
	})
	$(document).on("click", "#update", function(event){
		id = $(".rowupdate").children().eq(0).text();
		name = $(".rowupdate").children().eq(1).text();
		if($("input[name='id'").val() != "" && $("input[name='name']").val() != ""){
			$("#id-error").html("");
			$("#name-error").html("");
			if(confirm("Do you want to update this category ?") == true){
				$.ajax({
					type:"POST",
					url:"../database/server.php",
					data:{
						idUpdate:$(".rowupdate").children().eq(0).text(),
						name:$("input[name='name']").val()
					},
					success:function(data){
						if(data == "true"){
							alert("This category is updated !");
							setTimeout(function(){
								$("body").find(".rowupdate").removeClass();
							}, 200);
							$("#content").load("../db/category_save_.php");
							$("#myModal").modal('hide');
						}else{
							$("#message").html(data);
							setTimeout(function(){$("body").find("#show-error").children().fadeOut();}, 2500);
							setTimeout(function(){
								$("body").find(".rowupdate").removeClass();
							}, 200);
						}
					},
				})
			}else{
				setTimeout(function(){
					$("body").find(".rowupdate").removeClass();
				}, 200);
			}
			$("input[name='id'").val("");
			$("input[name='name'").val("");
		}
		else if($("input[name='id'").val() == "" && $("input[name='name']").val() == ""){
			$("#id-error").html("Id is required");
			$("#name-error").html("Name is required");
		}
		else if($("input[name='id'").val() != "" && $("input[name='name']").val() == ""){
			$("#id-error").html("");
			$("#name-error").html("Name is required");
		}
		else if($("input[name='id'").val() == "" && $("input[name='name']").val() != ""){
			$("#id-error").html("Id is required");
			$("#name-error").html("");
		}
		event.preventDefault();
	})

	// pagination

	setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	$("#content").load("../db/pagination_c.php");
	$(document).on("click", ".pagination li", function(event){
		var num = this.id;
		$(".pagination").find(".active").removeClass();
		$(this).addClass("active");
		setTimeout(function(){$("#content").load("../db/pagination_c.php?pages="+num);}, 400);
		event.preventDefault();
	})
	setInterval(function(){
		$(".badge.badge-success").load("../db/count_.php");
	}, 0);
	$("#pagination").load("../db/pagination_category_.php");


	// pagination
	// $("#search").keyup(function(){
	// 	if($("#search").val() != ""){
	// 		var val = this.value;
	// 		$("#pagination").load("../db/category_search_pagination.php?pages="+val);
	// 		$(".badge.badge-success").hide();
	// 		$("#search_item").show().load("../db/category_search_item.php?pages="+val);
	// 		$.ajax({
	// 			type:"POST",
	// 			url:"../db/category_search.php",
	// 			data:{
	// 				query:val
	// 			},
	// 			success:function(data){
	// 				$("#content").html(data);
	// 			}
	// 		})
	// 	}else{
	// 		$("#content").load("../db/category_save_.php");
	// 		$("#pagination").load("../db/pagination_category_.php");
	// 		$(".badge.badge-success").show();
	// 		$("#search_item").hide();
	// 	}
	// 	setTimeout(function(){$("ul.pagination li:first").addClass("active");}, 200);
	// })
})