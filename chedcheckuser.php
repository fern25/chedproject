<?php  

include "konek.php";

if(isset($_POST['request'])){

    $username = $_POST['cusername'];

    $user = mysqli_real_escape_string($con,$username);

    $sql = "SELECT * FROM chedaccount where username ='$user'";

    $result=$con->query($sql);
    if($result->num_rows>0){

            echo "exist";
    }
    else{
        echo "not exist";
    }

}

?>