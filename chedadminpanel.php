<?php  

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php?msg=youcannotovveridefromyouraccount!");
}
else{
    //nothing to do with this code
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>CHED Sending Form</title>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="adminpanel.css"> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
</head>
<style type="text/css">
body{background: url('chedpic/new.jpg'); background-size: cover; font-family: "courier new";font-size: 15px;
}
.panel-footer{
    position: fixed;
    bottom: 0;
    width: 100%;
}
.dropzone{
   max-height: 400px;
   margin-bottom: 5px;
   overflow:scroll;
   -webkit-overflow-scrolling: touch;
}
</style>
<body>
    <div class="container">
        <div class="col-sm-12"></div>
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="">
                        <label>
                            <?php 
                            include "konek.php";

                            $sql = "SELECT * FROM chedaccount where username = '$_SESSION[username]'";

                            $result = $con->query($sql);
                            if ($result->num_rows> 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row['name'];
                                }
                            }       
                            ?>      
                        </label>
                    </a>
                </li>
                <li class="active">
                    <a href="">Send Form</a>
                </li>
                <li>
                    <a href="chedviewsendschool.php">View School Sending Form</a>
                </li>
                <li>
                    <a href="chedviewschoollist.php">List of School</a>
                </li>
                <li>
                    <a href="chedlogout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="alert alert-warning" id="msg"><?php if(isset($_GET['msg'])){
          echo $_GET['msg']; 
      } ?></div>
      <div class="panel panel-default">
        <div class="panel-body" >
            <!-- some content -->
            <div class="col-sm-12">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">  
                    <label> Send File to School</label><br>

                    <form id="formDrop" enctype="multipart/form-data" class="dropzone">
                        <label>Name of School</label><br>
                        <select class="selcetpicker" name="sname">
                            <option>ALL</option>
                            <?php 
                            include "konek.php";

                            $sql = "SELECT * FROM schoolaccount ORDER BY schoolname";

                            $result = $con->query($sql);
                            if ($result->num_rows> 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option>'.$row['schoolname'].'</option>';
                                }
                            }       
                            ?> 
                        </select><br><br>
                        <label>School Department</label><br>
                        <select class="selcetpicker" name="sdepartment">
                            
                            <?php 
                            include "konek.php";

                            $sql = "SELECT DISTINCT schooldepartment FROM schoolaccount ORDER BY schooldepartment";

                            $result = $con->query($sql);
                            if ($result->num_rows> 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="2">'.$row['schooldepartment'].'</option>';
                                }
                            }       
                            ?> 
                        </select><br><br>

                        <div class="fallback">
                            <input name="file" class="" id="myId" type="file" multiple />
                        </div>
                        <center> 
                            <button id="snd_file" name="sendfile" class="btn btn-success hidden">Send Files</button>
                        </center>
                    </form>
                        <button class="btn btn-success" id="btn_trigger">Send Files</button>
                        <br>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="panel-footer">
    <center>© 2018 COMMISION ON HIGHER EDUCATION | CHED XI</center>
</div>
</div>
<script type="text/javascript">
    var myDropzone = new Dropzone("#formDrop", { 
        url: "cheduplaoder.php",
        autoProcessQueue: false,
    });
    
    $("#btn_trigger").click(function(){
        $("#snd_file").trigger("click");

        myDropzone.processQueue();
    });
</script>
</body>
</html>