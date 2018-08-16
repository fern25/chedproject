<!DOCTYPE html>
<html>
<head>
	 <title>Admin Panel</title>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<style type="text/css">
	
</style>
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
            <div class="panel panel-primary">
                <div class="navbar">
                    
                    <center>
                        <img src="ched/logo admin.png" width="100px" height="100px">
                    </center>
                </div>
                <div class="panel-body">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <label for="username" style="font-size: 17px">Username:</label><br>
                        <input id="username" type="text" name="user">
                        <br><br>
                        <label for="pass" style="font-size: 17px">Password:</label><br>
                        <input id="pass" type="password" name="pass"><br><br>
                        <button name="clogin" id="btn_login" class="btn btn-primary">Login</button>
                        <a href="registeradminched.php" class="btn btn-primary">Register</a>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <span id="loader" class="glyphicon glyphicon-refresh glyphicon-refresh-animate hidden"></span>
                    </div>
                </div>
                <br>
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