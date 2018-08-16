<?php  

session_start();
include "konek.php";

if(isset($_POST['request'])){

    $username = $_POST['cuser'];
    $password = $_POST['cpass'];

    $user = mysqli_real_escape_string($con,$username);
    $pass = mysqli_real_escape_string($con,md5($password));

    $sql = "SELECT * FROM chedaccount where username ='$user' and password='$pass'";

    $result=$con->query($sql);
    if($result->num_rows>0){
        while ($row=$result->fetch_assoc()) {

            $_SESSION['chedid'] = $row['chedid'];
            $_SESSION['username'] =$row['username'];
            $_SESSION['password'] =$row['password'];
        }
            echo "success";
    }
    else{
        echo "Login Failed please try again!";
    }

}

?>