<?php  

    include "konek.php";

    if (isset($_POST['request'])) {
        $user = $_POST['user'];
            $oldpass = $_POST['oldpass'];
            $newpass = md5($_POST['newpass']);
            $repass = md5($_POST['rnewpass']);

            if($newpass == $repass){

                $sql = "UPDATE schoolaccount set spass = '$repass' where suser='$user'";

                if($con->query($sql)){
                echo "success";
            }
            //header("location: index.php");
        }
            else{
            echo "Password mismatch!";
        }
    }
            
 ?>