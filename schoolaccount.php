<!DOCTYPE html>
<html lang="en">
<head>
  <title>School Registration</title>
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
  body{background: url('chedpic/FINAL BACK.jpg'); background-size: cover; font-family: "courier new";font-size: 15px;
  }
  .panel-body{border: 0px solid #fff; padding: 30px 40px; 
            margin-top: 21vh; 
            margin-right: 50vh;
            margin-left: 50vh;
            -webkit-box-shadow: 1px 4px 26px 11px rgba(0,0,0,75);
            -moz-box-shadow: 1px 4px 26px 11px rgba(0,0,0,0.75);
            box-shadow: 1px 4px 26px 11px rgba(0,0,0,0.75);
            
            border-radius: 58px 58px 58px 58px;
            -moz-border-radius: 58px 58px 58px 58px;
            -webkit-border-radius: 58px 58px 58px 58px;
            border: 0px solid #000000;
  }
  h3{color: #fff;
  }
  p{ font-size: 40px; }
</style>
<body>
        
           <div class="panel-body">
                    <p>Registration</p>
                    <div class="col-sm-12">

                        <div class="col-sm-6">
                            <label for="sname">School Name</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="susername">Username</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="sname" required="" type="text" name="sname">
                        </div>
                        <div class="col-sm-6">
                            <input name="susername" required="" id="susername" type="text" >
                        </div>
                        <div class="col-sm-12"><br></div>

                        <div class="col-sm-6">
                            <label for="sdepartment">School Department</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="spass">Password</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="sdepartment" required="" type="text" name="sdepartment">
                        </div>
                        <div class="col-sm-6">
                            <input name="spass" required="" id="spass" type="password" >
                        </div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-6">
                            <label for="fullname">Fullname</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="scpass">Confirm Password</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="fullname" required="" type="text" name="fullname">
                        </div>
                        <div class="col-sm-6">
                           <input name="scpass" required="" id="scpass" type="password" >
                       </div>
                       <div class="col-sm-12"><br></div>
                       <div class="col-sm-12">
                        <label for="position">Position</label>
                    </div>
                    <div class="col-sm-6">
                        <input  id="position" required="" type="text" name="position">
                    </div>

                    <div class="col-sm-12"><br></div>
                    <div class="col-sm-12">
                        <center>
                            <button name="cbutton" id="btn_register" class="btn btn-success">Register</button>
                            <a href="index.php" class="btn btn-success">Login</a>
                        </center>
                    </div>
                </div>
            </div>
    

<script>
    $(document).ready(function(){
        $("#sname").focus();

//trigger key if input keydown on textbox btn_register
$("#sname").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#sdepartment").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#fullname").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#position").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#susername").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#spass").keydown(function(e){
    if(e.keyCode ==13){

        $("#btn_register").trigger("click");
    }
});
$("#scpass").keydown(function(e){
    if(e.keyCode ==13){
        $("#btn_register").trigger("click");
    }
});


$("#btn_register").click(function(){

    if($("#sname").val() == "" ||$("#sdepartment").val() == "" ||$("#fullname").val() == "" ||$("#position").val() == "" ||$("susername").val() == "" ||$("#spass").val() == "" ||$("#scpass").val() == ""){

        $.bootstrapGrowl('You must put data into the fields to proceed',{
            type: 'warning',
            delay: 2000,
        });

    }
    else{

        $.ajax({
            url: "checkschooluser.php",
            type: "post",
            cache: false,
            data: {
                "request":1,
                "susername": $("#susername").val()
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
                        url: "schoolregister.php",
                        cache: false,
                        type: "post",
                        data: {
                            "request":1,
                            "sname": $("#sname").val(),
                            "sdepartment": $("#sdepartment").val(),
                            "fullname":$("#fullname").val(),
                            "position": $("#position").val(),
                            "susername": $("#susername").val(),
                            "spass": $("#spass").val(),
                            "scpass": $("#scpass").val()
                        },
                        success:function(data){
                            if(data == "success"){
                             $("#sname").focus();
                             $("#sname").val("");
                             $("#sdepartment").val("");
                             $("#fullname").val("");
                             $("#position").val("");
                             $("#susername").val("");
                             $("#spass").val("");
                             $("#scpass").val("");
                             $.bootstrapGrowl('Register Complete',{
                                type: 'success',
                                delay: 2000,
                            });
                         }
                         else{
                            $("#spass").val("");
                            $("#scpass").val("");

                            $("#spass").focus();
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