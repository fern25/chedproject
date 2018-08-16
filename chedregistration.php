<!DOCTYPE html>
<html lang="en">
<head>
  <title>CHED Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<style type="text/css">
  body{background: url('chedpic/new.jpg'); background-size: cover; font-family: "courier new";font-size: 15px;
  }
  .panel-body{
            background-color:  #6f86d6;
            border: 0px solid black; padding: 30px 40px; 
            margin-top: 5vh; 
            margin-right: 50vh;
            margin-left: 50vh;
            -webkit-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
            -moz-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
            box-shadow: 1px 4px 26px 11px rgba(0,0,0,0);
            
            border-radius: 58px 58px 58px 58px;
            -moz-border-radius: 58px 58px 58px 58px;
            -webkit-border-radius: 58px 58px 58px 58px;
            
  }
  h3{color: #fff;
  }
  strong{ font-size: 40px; }
</style>
<body>
        <div class="img">

            <img src="chedpic/header.png" width="1000px" height="150px">
        </div>
           <div class="panel-body">
                    <strong>CHED Registration</strong>
                    <div class="col-sm-12">

                        <div class="col-sm-6">
                            <label for="cusername">Username</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="cname">Name</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="cusername" required="" type="text" name="cusername">
                        </div>
                        <div class="col-sm-6">
                            <input name="cname" required="" id="cname" type="text" >
                        </div>
                        <div class="col-sm-12"><br></div>

                        <div class="col-sm-6">
                            <label for="cdepartment">Password</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="cpass">Department</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="cpass" required="" type="password" name="cpass">
                        </div>
                        <div class="col-sm-6">
                            <input name="cdepartment" required="" id="cdepartment" type="text" >
                        </div>
                        <div class="col-sm-12"><br></div>
                        
                        <div class="col-sm-12">
                            <label for="ccpass">Confirm Password</label>
                        </div>
                        <div class="col-sm-12">
                           <input name="ccpass" required="" id="ccpass" type="password" >
                       </div>
                       <div class="col-sm-12"><br></div>
                    <div class="col-sm-12"><br></div>
                    <div class="col-sm-12">
                        <center>
                            <button name="cbutton" id="btn_register" class="btn btn-success">Register</button>
                            <a href="chedadmin.php" class="btn btn-success">Login</a>
                        </center>
                    </div>
                </div>
            </div>
    

<script>
    $(document).ready(function(){
        $("#cname").focus();

//trigger key if input keydown on textbox btn_register
$("#cname").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#cdepartment").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});

$("#cusername").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#cpass").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#ccpass").keydown(function(e){
    if(e.keyCode ==13){
        $("#btn_register").trigger("click");
    }
});


$("#btn_register").click(function(){

    if($("#cname").val() == "" ||$("#cdepartment").val() == "" ||$("cusername").val() == "" ||$("#cpass").val() == "" ||$("#ccpass").val() == ""){

        $.bootstrapGrowl('You must put data into the fields to proceed',{
            type: 'warning',
            delay: 2000,
        });

    }
    else{

        $.ajax({
            url: "chedcheckuser.php",
            type: "post",
            cache: false,
            data: {
                "request":1,
                "cusername": $("#cusername").val()
            },
            success: function(data){
                if(data == "exist"){

                    $("#susername").focus();
                    
                    $.bootstrapGrowl('Username already exist',{
                        type: 'warning',
                        delay: 2000,
                    });
                }
                else{

                    $.ajax({
                        url: "chedregister.php",
                        cache: false,
                        type: "post",
                        data: {
                            "request":1,
                            "cname": $("#cname").val(),
                            "cdepartment": $("#cdepartment").val(),
                            "cusername": $("#cusername").val(),
                            "cpass": $("#cpass").val(),
                            "ccpass": $("#ccpass").val()
                        },
                        success:function(data){
                            if(data == "success"){
                             $("#cname").focus();
                             $("#cname").val("");
                             $("#cdepartment").val("");
                             $("#cusername").val("");
                             $("#cpass").val("");
                             $("#ccpass").val("");
                             $.bootstrapGrowl('Register Complete',{
                                type: 'success',
                                delay: 2000,
                            });
                         }
                         else{
                            $("#cpass").val("");
                            $("#ccpass").val("");

                            $("#cpass").focus();
                            $.bootstrapGrowl(data,{
                                type: 'danger',
                                delay: 2000
                            });
                        }
                    }
                });
                }
            }
        });
    }
});
});
</script>

</body>
</html>