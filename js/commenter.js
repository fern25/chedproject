$(document).ready(function(){

	$("#btn_submit").click(function(){

		$.ajax({
			type: "post",
			cache: false,
			url: "php_add_comment.php",
			data: {
				"request" :1,
				"custID": $("#my_id").text(),
				"comID": $("#cust_id").text(),
				"comments": $("#txt_comment").val()
			},
			success:function(data){
				if(data == "success"){
					$("#com_notif").removeClass("hidden");
					$("#txt_comment").val(null);
					$("#txt_comment").focus();
					setTimeout(function(){

						$("#com_notif").addClass("hidden");

					},2000);
				}
				else{
					console.log(data)
						// comment notifier
					}
				}
			});
	});
});