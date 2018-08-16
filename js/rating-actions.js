$(document).ready(function(){
		//insert_rating.php

		ajax_checker();

		setInterval(function(){

			ajax_checker();
			
		},3000);


		function ajax_checker(){
			$.ajax({

			type:"post",
			cache: false,
			url: "if_rated.php",
			data:{
				"request":1,
				"id":$("#my_id").text(),
				"pid": $("#cust_id").text()
			},
			success: function(data){
				console.log(data);
				if(data != ""){
					$("#rateno").html(data);
					$("#not_rated").addClass("hidden");
					$("#rated").removeClass("hidden");
					$("#done_rate").addClass("hidden");
				}
				else{

					$("#not_rated").removeClass("hidden");
					$("#rated").addClass("hidden");
					$("#done_rate").addClass("hidden");
				}
			}

		});
		}

		$Rate = 0;
		$idno = $("#my_id").text();
		$newidno = parseInt($idno);
		$custID = $("#cust_id").text();
		$newcustid = parseInt($custID);
		$ratetxt = $("#rate_text").text();

		if(parseInt($ratetxt) <= 3){
			$("#rate_text").css("color","red");
		}
		else{
			(parseInt($ratetxt) > 3)
			$("#rate_text").css("color","green");
		}

		$("#s1").click(function(){
			console.log($newidno);

			$Rate = 1;

			my_ajax();

			$("#not_rated").addClass('hidden');
			$("#done_rate").addClass('hidden');

		});
		$("#s2").click(function(){
			console.log($newcustid);
			$Rate = 2;

			my_ajax();

			$("#not_rated").addClass('hidden');
			$("#done_rate").removeClass('hidden');
		});
		$("#s3").click(function(){
			$Rate = 3;

			my_ajax();

			$("#not_rated").addClass('hidden');
			$("#done_rate").removeClass('hidden');
		});
		$("#s4").click(function(){
			$Rate = 4;

			my_ajax();

			$("#not_rated").addClass('hidden');
			$("#done_rate").removeClass('hidden');
		});
		$("#s5").click(function(){
			$Rate = 5;

			my_ajax();

			$("#not_rated").addClass('hidden');
			$("#done_rate").removeClass('hidden');
		});


		function my_ajax(){

			$.ajax({
				url: "insert_rating.php",
				type: "POST",
				cache: false,
				data: {
					"request":1,
					"id": $newidno, //parseInt($("#my_id").text())
					"Rate": $Rate,
					"custID": $newcustid //parseInt($("#cust_id").text())
				},
				success: function(data){

				}
			});
		}
	});