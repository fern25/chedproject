<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>School Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jqueryy/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>

    <link rel="stylesheet" type="text/css" href="loading_animation.css">
</head>
<style type="text/css">
    
    .panel-body{
              background-color: #6f86d6;
              border: 0px solid black; padding: 50px 60px; 
              margin-top: 5vh; 
              margin-right: 80vh;
              margin-left: 70vh;
              -webkit-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
              -moz-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0.0);
              box-shadow: 1px 4px 26px 11px rgba(0,0,0,0.0);
                border-radius: 58px 58px 58px 58px;
                -moz-border-radius: 58px 58px 58px 58px;
                -webkit-border-radius: 58px 58px 58px 58px;
    }
  strong{ font-size: 40px;
    margin-left: 60px;
  }
  label{color: black;
  }
</style>
<body style="background: url('chedpic/new.jpg');background-repeat: no-repeat;background-size: cover;font-family: 'courier new'; font-size: 15px" >
    <div>
        <img src="chedpic/header" width="900px" height="130px">
    </div>
                <div class="panel-body">
                    <strong>LOGIN</strong>
                    <div class="col-sm-12">
                        <center>
                        <label for="username">Username</label><br>
                        <input id="username" type="text" name="user">
                        <br><br>
                        <label for="pass">Password</label><br>
                        <input id="pass" type="password" name="pass"><br><br>
                        </center>
                    </div>
                    <button name="clogin" id="btn_login" class="btn btn-success btn-block">Login</button>
                        <a href="schoolaccount.php" class="btn btn-primary btn-block hidden">Create Account</a>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <span id="loader" class="glyphicon glyphicon-refresh glyphicon-refresh-animate hidden"></span>
                    </div>
                </div>
    <script>
        $(document).ready(function(){

            $("#username").focus();
            
            //keypress for trigger to click btn_login
            $("#pass").keydown(function(e){
                if(e.keyCode == 13){
                    $("#btn_login").trigger("click");
                }
            });
            $("#username").keydown(function(e){
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
                    url: "schoollogin.php",
                    cache: false,
                    data: {
                        "request": 1,
                        "user": $("#username").val(),
                        "pass": $("#pass").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            window.location.href='dashboard.php';
                        }
                        else{
                            $("#pass").val("");
                            $("#username").val("");
                            $("#username").focus();
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