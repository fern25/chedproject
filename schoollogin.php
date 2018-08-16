<?php  

session_start();
include "konek.php";

if(isset($_POST['request'])){

    $username = $_POST['user'];
    $password = $_POST['pass'];

    $user = mysqli_real_escape_string($con,$username);
    $pass = mysqli_real_escape_string($con,md5($password));

    $sql = "SELECT * FROM schoolaccount where suser ='$user' and spass='$pass'";

    $result=$con->query($sql);
    if($result->num_rows>0){
        while ($row=$result->fetch_assoc()) {

            $_SESSION['sid'] = $row['schoolID'];
            $_SESSION['suser'] =$row['suser'];
            $_SESSION['spass'] =$row['spass'];
             $_SESSION['fullanme'] =$row['fullname'];

        }
            echo "success";
    }
    else{
        echo "Login Failed please try again!";
    }

}

?>