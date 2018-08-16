<?php  

session_start();

if(!isset($_SESSION['suser'])){
    header("location:index.php?msg=youcannotovveridefromaccount!");
}
else{
    //nothing to do with this code
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Uplaod Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
</head>
<style type="text/css">
body{background: url('chedpic/new.jpg') no-repeat; background-size: cover; font-family: "courier new";
margin: 0; 
padding: 0;
}
.{box-sizing: border-box;}
.header{position: absolute; 
    height: 44px;
    width: 100%;
    background-color: ;
    z-index: 4;
}
.side-nav{position: absolute; 
    width: 100%; 
    background-color: #666; 
    height: 100vh;
    z-index: 3;
    padding-top: 44px;
}
.side-nav ul{
    list-style: none;
    margin: 0;
    padding: 0;
}
.side-nav ul li{
    padding: 20px 10px;
    border-bottom: 1px solid #333;
}
.side-nav ul li a{
    color: #fff;
    text-decoration: none;
}
.glyphicon{
    color: white;
}
.main-content{
    padding-top: 10px;
}
.btn span:hover{ color: skyblue; }
.panel-default{border: 0px solid #fff; padding: 50px 60px; 
  margin-right: 60vh;
  margin-left: 60vh;

  border-radius: 18px 18px 18px 18px;
  -moz-border-radius: 18px 18px 18px 18px;
  -webkit-border-radius: 18px 18px 18px 18px;
  border: 0px solid #000000;
}
.panel-default{
 max-height: 450px;
 margin-bottom: 5px;
 overflow:scroll;
 -webkit-overflow-scrolling: touch;
}
@media screen and (min-width: 600px){
    .side-nav{width: 80px;}
    .side-nav ul li{text-align: center;}
    .side-nav ul li span:nth-child(2){
        display: none;
    }
    .glyphicon{font-size: 26px;}
    .header{text-align: center;}
    .main-content{ margin-left: 200px; }

    @media screen and (min-width: 1000px){
        .side-nav{width: 200px;}
        .side-nav ul li{ text-align: left; }
        .side-nav ul li span:nth-child(2){
            display: inline;
        }
        .glyphicon{ font-size: 16px; }
    </style>
    <body>
        <div class="header">    
        </div>

        <div class="side-nav">
            <nav>
                <ul class="btn">
                    <li>
                        <a href="dashboard.php"><label class="glyphicon glyphicon-user">
                            <?php 
                            include "konek.php";

                            $sql = "SELECT * FROM schoolaccount where suser = '$_SESSION[suser]'";

                            $result = $con->query($sql);
                            if ($result->num_rows> 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row['fullname'];
                                }
                            }

                            ?></label></a>
                        </li>
                        <li>
                            <a href="schooluplaodfile.php">
                                <span class="glyphicon glyphicon-upload">
                                Upload Form</span>
                            </a>
                        </li>
                        <li>
                            <a href="schoolviewmsg.php">
                                <span class="glyphicon glyphicon-envelope">
                                Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="schoolchangepass.php">
                                <span class="glyphicon glyphicon-edit">
                                Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="schoolLogout.php">
                                <span class="glyphicon glyphicon-log-out">
                                Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="main-content">
                <img src="chedpic/header.png" width="1000px" height="150px">
            </div>
            <br>

            <div class="panel panel-default">
                <div class="panel-body" >
                    <div class="col-sm-12"> 

                        <form id="formDrop" enctype="multipart/form-data" class="dropzone">
                           <div class="fallback">
                            <input name="file" id="myId" type="file" multiple />
                        </div>
                        <br>
                    <button class="hidden" name="sendfile" id="perform_click"></button>
                    </form>
                    <center> 
                        <button id="send_file" class="btn btn-success">Send Files</button>
                    </center>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var myDropzone = new Dropzone(".dropzone", { 
                url: "uploader.php",
                autoProcessQueue: false,
            });
            $("#send_file").click(function(){
                $("#perform_click").trigger("click");
                myDropzone.processQueue();

            });
/*
            setInterval(function(){
                 myDropzone.on("complete", function(file) {
                  file.previewElement.addEventListener("click", function() {
                    myDropzone.removeFile(file);
                });
              });
          },1);*/



      </script>

  </body>
  </html>