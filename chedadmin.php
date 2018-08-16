<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CHED Admin Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jqueryy/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>

    <link rel="stylesheet" type="text/css" href="loading_animation.css">
</head>
<style type="text/css">
	body{background: url('chedpic/new.jpg') no-repeat; background-size: cover; font-family: "courier new";
		margin: 0; 
		padding: 0;
	}
	.panel-body{
              background-color: #6f86d6;
              border: 0px solid #fff; padding: 50px 60px; 
              margin-right: 80vh;
              margin-left: 70vh;
              -webkit-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
              -moz-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
              box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
    
    border-radius: 58px 58px 58px 58px;
    -moz-border-radius: 58px 58px 58px 58px;
    -webkit-border-radius: 58px 58px 58px 58px;
  }
  label{
    color: black;
  }
</style>
<body>
	<div class="header">
		<img src="chedpic/header.png" width="1000px" height="150px">
	</div>
         <div class="panel-body">
         	<center>
              <p><img src="chedpic/logo admin.png" width="100px" height="100px"></p>
            <div class="col-sm-12">
                <label for="cname">Username</label><br>
                <input id="cname" type="text" name="cuser">
                <br><br>
                <label for="cpass">Password</label><br>
                <input id="cpass" type="password" name="cpass"><br><br>
            </div>
            </center>
            <button name="clogin" id="btn_login" class="btn btn-success btn-block">Login</button>
                <a href="chedregistration.php" class="btn btn-success btn-block">Registration</a>

        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <span id="loader" class="glyphicon glyphicon-refresh glyphicon-refresh-animate hidden"></span>
            </div>
        </div>
           
    <script>
        $(document).ready(function(){

            $("#crname").focus();
            
            //keypress for trigger to click btn_login
            $("#cpass").keydown(function(e){
                if(e.keyCode == 13){
                    $("#btn_login").trigger("click");
                }
            });
            $("#cname").keydown(function(e){
                if(e.keyCode == 13){
                    $("#btn_login").trigger("click");
                }
            });

            $("#btn_login").click(function(){

                //adding loading function
                /*$("#loader").removeClass("hidden");
                setTimeout(function(){

                $("#loader").addClass("hidden");

            },1000);*/

                //ajax login
                $.ajax({
                    type: "post",
                    url: "chedadminlogin.php",
                    cache: false,
                    data: {
                        "request": 1,
                        "cuser": $("#cname").val(),
                        "cpass": $("#cpass").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            window.location.href='chedadminpanel.php';
                        }
                        else{
                            $("#cpass").val("");
                            $("#cname").val("");
                            $("#cname").focus();
                            //floating notifier
                            $.bootstrapGrowl('Login failed please try again',{
                                type: 'danger',
                                delay: 2000,

                            });
                        }
                    }
                });
                
            });
        });
    </script>
    
</body>
</html>