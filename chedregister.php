<?php  

include "Konek.php";

if(isset($_POST['request'])){

 $cname = $_POST['cname'];
 $cdepartment = $_POST['cdepartment'];
 $cusername = $_POST['cusername'];
 $cpass = md5($_POST['cpass']);
 $ccpass = md5($_POST['ccpass']);

 if($cpass == $ccpass){
    $sql = "INSERT chedaccount VALUES(null,'$cname','$cdepartment','$cusername','$cpass')";

    if($con->query($sql)){
        echo "success";
    }
}
else{
    echo "Password mismatch!";
}

}
?>