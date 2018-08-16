$(document).ready(function(){

		var idarray = new Array();
		var comarray = new Array();

		live_comment();

		setInterval(function(){
			live_comment();
			console.log("triggered");
		},2000);

		function live_comment(){

			idarray = [];
			comarray = [];
			$.ajax({
				url: "php_comments.php",
				type: "post",
				cache: false,
				dataType: "JSON",
				data: {
					"request":1,
					"comID": $("#cust_id").text()
				},
				success: function(data){

					console.log(data);

					for(var x = 0;x<data[0].length;x++){
						
						idarray.push(data[0][x]);
						
						$("#comID").remove();
						$("#comCont").remove();
						$("#comment_break").remove();
						$("#horizontal_break").remove();
					}
					for(var x = 0;x<data[1].length;x++){
						
						comarray.push(data[1][x]);
					}


					for(var x=0;x<idarray.length;x++){

						$txt3 =$("<label></label>").text(idarray[x]);
						var break_line = document.createElement("br");
						var horizontal_break = document.createElement("hr");
						$txt4 = $("<h5></h5>").text(comarray[x]);

						$("#comment_sec").append($txt3);
						$txt3.attr("id","comID");
						$("#comment_sec").append($txt4);
						$txt4.attr("id","comCont");

						$("#comment_sec").append(break_line);
						break_line.setAttribute("id","comment_break");
						$("#comment_sec").append(horizontal_break);
						horizontal_break.setAttribute("id","horizontal_break");


					}
				}
			});
		}
		
	});