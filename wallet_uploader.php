<?php  

session_start();
if ($_SERVER['HTTPS'] != "on") {
	$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	header("Location: $url");
	exit;
}
if(!isset($_SESSION['admin_user'] )&& !isset($_SESSION['admin_pass'])){
	header("location:index.php?msg=overrideblock!");
}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Lifetime Int'l Corp</title>

	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Our Custom CSS -->
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="../style/style3.css">
	<link rel="icon" href="img/hey.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/accounting.min.js"></script>


	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="../js/notify.min.js"></script>



	<link rel="stylesheet" type="text/css" href="../style/iziModal.css">
	<link rel="stylesheet" type="text/css" href="../style/iziModal.min.css">
	<script type="text/javascript" src="../js/iziModal.js"></script>
	<script type="text/javascript" src="../js/iziModal.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../style/dropzone.css">
	<script type="text/javascript" src="../js/dropzone.min.js"></script>
	<script type="text/javascript" src="../js/require.js"></script>
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar">
			<div id="dismiss">
				<i class="glyphicon glyphicon-arrow-left"></i>
			</div>

			<div class="sidebar-header">
				™️<h3> Lifetime Int'l Trader</h3>
			</div>

			<ul class="list-unstyled components">
				<li>
					<a  href="account.php">Dashboard</a>
				</li>
				<li >
					<a href="activate_user.php">Account Activation</a>
				</li>
				<li>
					<a class="nav next" href="change_password.php">Account Details</a>
				</li>
				<li>
					<a class="nav next" href="update_token.php">Tokens</a>
				</li>
				<li>
					<a href="btc_multiplier.php">Withdrwals and Etc</a>
				</li>
				<li class="active">
					<a  href="wallet_uploader.php">Wallet Updater</a>
				</li>
			</ul>


		</nav>

		<!-- Page Content Holder -->
		<div id="content">

			<nav class="navbar navbar-default">
				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
							<i class="glyphicon glyphicon-align-justify"></i>
						</button>

					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a>Lifetime Int'l Corp</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="" data-toggle="collapse" data-target="#acc_menu"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION['admin_user']; ?> </a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="col-sm-4">
				<h3>- If you want to upload new image wallet you must upload it to be recognize in second panel which you can select the name of your wallet then you can set it to active so the client can view the new wallet addresses. --dev </h3>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="../actions/upload.php" id="uploader" class="dropzone"></form>
						<label>Image Name:</label>
						<input type="text" class="form-control" placeholder="Eg. Blockchain Address 1" id="img_name">
						<label>Wallet Address:</label>
						<input type="text" id="img_add" class="form-control" placeholder="Eg. 1DF2V33twqc6kfjfE818METCT4mMwGar82"><br>
						<center>
							<button class="btn btn-success" id="btn_click">Upload Wallet</button>
						</center>
					</div>
				</div>

			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<select class="form-control" id="qr_name">
							<option disabled selected="true">Select image name:</option>
							<option>1</option>
							<option>3</option>
							<option>4</option>
						</select> 
						<br>
						<img src="../img/default.jpg" class="img-responsive" width="500" height="500" id="qr_img">
						<br>
						<input type="text" value="1DF2V33twqc6kfjfE818METCT4mMwGar82" class="form-control" readonly id="qr_add">
						<br>
						<center>
							<button class="btn btn-success" id="set_active">Set as Active</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>

	<button class="open-alert button hidden" id="buy_submited">alert_lose</button>
	<div id="modal-alert" class="iziModal" data-izimodal-title="You request has been successfuly submitted"></div>

	<div class="overlay"></div>
	<script type="text/javascript">
		$(document).ready(function () {

			$("#set_active").click(function(){
				//to be continue
				$.ajax({
					url:"../actions/set_active_wallet.php",
					type:"post",
					data:{
						"request":1,
						"name":$("#qr_name").val()
					},
					success:function(data){
						if (data == "success") {
							$.notify('Set wallet success',{
								className: 'success',
								z_index: 2,
								autoHideDelay: 2000
							});
							$("#qr_name").prop("selectedIndex",0);
							$("#qr_img").attr("src","../img/default.jpg");
							$("#qr_add").val("1DF2V33twqc6kfjfE818METCT4mMwGar82");
						}
						else{
							$.notify('Set wallet failed!',{
								className: 'error',
								z_index: 2,
								autoHideDelay: 2000
							});
						}
					}
				});
			});

			get_names();

			function get_names(){
				$.ajax({
					url:"../actions/wallet_img.php",
					type: "post",
					dataType: "json",
					data:{
						"request":1,
					},
					success:function(data){
						$("#qr_name").empty();
						
						$("#qr_name").append("<option disabled selected='true'>Select image name:</option>");

						for (var i = 0; i < data.length; i++) {
							console.log(data[i]);
							$("#qr_name").append("<option>"+data[i]+"</option>");
						}

					}
				});

			}

			$("#qr_name").change(function(){
				$.ajax({
					url: "../actions/get_curr_img.php",
					type: "post",
					dataType:"json",
					data:{
						"request":1,
						"name":$("#qr_name").val(),
					},
					success:function(data){
						$("#qr_img").attr("src","../uploads/"+data[0]);
						$("#qr_add").val(data[1]);
					}
				});
			});
			var myDropzone = new Dropzone("#uploader", {
				url: "../actions/upload.php",                 
				autoProcessQueue: false,
				maxFiles: 1,

			});

			$("#btn_click").click(function(){
				if ($("#img_name").val() == "" || $("#img_add").val() == "") {
					$.notify('Fill those field to proceed',{
						className: 'error',
						z_index: 2,
						autoHideDelay: 2000
					});

				}
				else if (myDropzone.getQueuedFiles().length <= 0) {
					$.notify('You cannot update without updating image',{
						className: 'error',
						z_index: 2,
						autoHideDelay: 2000
					});
				}
				else{
					$.ajax({
						url: "../actions/img_checker.php",
						type:"post",
						data:{
							"request":1,
							"img":myDropzone.files[0].name,
						},
						success:function(data){
							if (data == "success") {
								myDropzone.removeAllFiles(true);
								$.notify('Image already exists!',{
									className: 'error',
									z_index: 2,
									autoHideDelay: 2000
								});
							}
							else{

								$.ajax({
									url: "../actions/insert_qr_wallet.php",
									type: "post",
									data:{
										"request":1,
										"img":myDropzone.files[0].name,
										"name":$("#img_name").val(),
										"address":$("#img_add").val(),
									},
									success:function(data){
										myDropzone.processQueue();

										$.notify('Wallet address updated successfuly!',{
											className: 'success',
											z_index: 2,
											autoHideDelay: 2000
										});
										$("#img_name").val(null);
										$("#img_add").val(null);
										myDropzone.removeAllFiles(true);
										get_names();
									}
								});

							}
						}
					});
					
				}
			});

			$("#image_selected").change(function(){

			});

			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			});

			$('#dismiss, .overlay').on('click', function () {
				$('#sidebar').removeClass('active');
				$('.overlay').fadeOut();
			});

			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').addClass('active');
				$('.overlay').fadeIn();
				$('.collapse.in').toggleClass('in');
				$('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});
		});
	</script>
</body>
</html>
