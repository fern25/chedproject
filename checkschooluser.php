<?php  

include "konek.php";

if(isset($_POST['request'])){

    $username = $_POST['susername'];

    $user = mysqli_real_escape_string($con,$username);

    $sql = "SELECT * FROM schoolaccount where suser ='$user'";

    $result=$con->query($sql);
    if($result->num_rows>0){

        echo "exist";
    }
    else{
        echo "not exist";
    }

}

?>