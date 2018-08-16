<?php  

session_start();
session_destroy();
header("location:chedadmin.php?logoutadmin!");

?>