<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Register</title>
<style>
	body{background-image:url(chedpic/background.jpg); background-size:cover} 
	
	.container{
	 width: 400px;
	 height: 420px;
	 text-align: center;
	 margin: 0 auto;
	 background-color: rgba(44, 62, 80,0.7);
	 margin-top: 220px;
	}
	 
	.container img{
	 width: 150px;
	 height: 150px;
	 margin-top: -50px;
	}
	 
	input[type="text"],input[type="password"]{
	 margin-top: 10px;
	 height: 30px;
	 width: 200px;
	 font-size: 18px;
	 margin-bottom: 20px;
	 background-color: #fff;
	 padding-left: 40px;
	}
	 
	.form-input::before{
	 font-family: "FontAwesome";
	 padding-left: 07px;
	 padding-top: 40px;
	 position: absolute;
	 font-size: 0px;
	 color: #2980b9; 
	}
	 
	.btn-login{
	 padding: 15px 25px;
	 border: none;
	 background-color: #27ae60;
	 color: #fff;
	}
	
	.btn-register{
	 padding: 15px 12px;
	 margin-top: 10px;
	 margin-left: 15px;
	 border: none;
	 background-color: #27ae60;
	 color: #fff;
	 text-decoration:none;
	}
	</style>
</head>

<body>
	<div class="container">
    <img src="chedpic/logo admin.png"/>
    <form>
     <div class="form-input">
     <input type="text" name="text" placeholder="Fullname"/> 
     </div>
     <div class="form-input">
     <input type="text" name="text" placeholder="Username"/> 
     </div>
     <div class="form-input">
     <input type="password" name="password" placeholder="Password"/>
     </div>
     <div class="form-input">
     <input type="password" name="password" placeholder="Confirm Password"/>
     </div>
     <input type="submit" type="submit" value="REGISTER" class="btn-login"/>
     <a href="admin.php" class="btn-register">CANCEL</a>
     </form>
     </div>
</body>
</html>