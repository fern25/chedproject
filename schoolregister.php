<?php  

include "Konek.php";

if(isset($_POST['request'])){

 $sname = $_POST['sname'];
 $sdepartment = $_POST['sdepartment'];
 $fullname = $_POST['fullname'];
 $position = $_POST['position'];
 $susername = $_POST['susername'];
 $spass = md5($_POST['spass']);
 $scpass = md5($_POST['scpass']);

 if($spass == $scpass){
    $sql = "INSERT schoolaccount VALUES(null,'$sname','$sdepartment','$fullname','$position','$susername','$spass')";

    if($con->query($sql)){
        echo "success";
    }
}
else{
    echo "Password mismatch!";
}

}
?>