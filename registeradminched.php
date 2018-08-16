<!DOCTYPE html>
<html>
<head>
    <title>Registration Admin</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
</head>
<body style="background: url('ched/FINAL BACK.jpg');background-repeat: no-repeat;background-size: cover;font-family: 'courier new'">

    <div class="container">
        <div class="navbar">
            <div class="container-fluid">  
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-sm-3"></div>
        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="navbar navbar-inverse">
                    <center>
                        <h4 style="color: white">Registration</h4>
                    </center>
                </div>
                <div class="panel-body">

                    <div class="col-sm-12">

                        <div class="col-sm-6">
                            <label for="fname">First Name:</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="username">Username:</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="fname" required="" type="text" name="fname">
                        </div>
                        <div class="col-sm-6">
                            <input name="user" required="" id="username" type="text" >
                        </div>
                        <div class="col-sm-12"><br></div>

                        <div class="col-sm-6">
                            <label for="lname">Last Name:</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="pass">Password:</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="lname" required="" type="text" name="lname">
                        </div>
                        <div class="col-sm-6">
                            <input name="pass" required="" id="pass" type="password" >
                        </div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-6">
                            <label for="address">Address:</label>
                        </div>
                        <div class="col-sm-6">
                            <label for="pass1">Retype Password:</label>
                        </div>
                        <div class="col-sm-6">
                            <input  id="address" required="" type="text" name="address">
                        </div>
                        <div class="col-sm-6">
                           <input name="rpass" required="" id="pass1" type="password" >
                       </div>
                       <div class="col-sm-12"><br></div>
                       <div class="col-sm-12">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-sm-6">
                        <input  id="email" required="" type="email" name="email">
                    </div>

                    <div class="col-sm-12"><br></div>
                    <div class="col-sm-12">
                        <center>
                            <button name="cbutton" id="btn_register" class="btn btn-primary">Register</button>
                            <a href="loginadminched.php" class="btn btn-primary">Cancel</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <center>
                    © 2018 COMMISION ON HIGHER EDUCATION
                </center>
            </div>
        </div>
    </div>
</div>
</body>
</html>