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
    <title>CHED School List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="adminpanel.css"> -->
</head>
<style type="text/css">
    body{background: url('chedpic/new.jpg'); background-size: cover; font-family: "courier new";font-size: 15px;
  }

  .panel-footer{
        position: fixed;
        bottom: 0;
        width: 100%;
  }
  .panel-default{
       max-height: 450px;
        margin-bottom: 10px;
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
                <li>
                    <a href="chedadminpanel.php">Send Form</a>
                </li>
                <li>
                    <a href="chedviewsendschool.php">View School Sending Form</a>
                </li>
                <li class="active">
                    <a href="chedviewschoollist.php">List of School</a>
                </li>
                <li>
                    <a href="chedlogout.php">Logout</a>
                </li>
            </ul>
        </div>
        <br>
        <br>
        <div class="panel panel-default">
            <div class="panel-body" >
                <!-- some content -->
                <div class="col-sm-12">
                <div class="col-sm-4"></div>
                     
                <div class="col-sm-12">
                
                <div class="col-sm-4">
                    <label>School Name</label>
                </div>
                <div class="col-sm-4">
                    <label>School Department</label>
                </div>
                <div class="col-sm-4">
                    <label>Name</label>
                </div>
                <div class="col-sm-12">
                </div>
            </div>
        </div>
        
            <?php  

            include "konek.php";


            $sql = "SELECT * from schoolaccount ORDER BY schoolname";
            
            $result=$con->query($sql);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {

                    
                    echo "

                    <div class='col-sm-12' style='background-color: #F8F8F8; border-radius: 5px;'>
                    <div class='col-sm-4'>
                    <h4>"  .$row['schoolname']."</h4>
                    </div>
                    <div class='col-sm-4'>
                    <h4>"  .$row['schooldepartment']. "</h4>
                    </div>
                    <div class='col-sm-4'>
                    <h4>".$row['fullname']."</h4>
                    </div>
                    </div>
                    
                    ";
                }
            }


            ?>
             </div>
         </div>
     </div>
<div class="panel-footer">
            <center>© 2018 COMMISION ON HIGHER EDUCATION | CHED XI</center>
        </div>
</div>
</body>
</html>