x<?php  

session_start();
include "konek.php";


if(isset($_POST['sendfile'])){
 
 $name = str_replace(" ", "",$_FILES['file']['name']);
 $target_dir = "chedfile/";
 $target_file = $target_dir . str_replace(" ","",basename($_FILES['file']['name']));
 $cheddepartment = "";

 $sname = $_POST['sname'];
 $sdepartment = $_POST['sdepartment'];



   // move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("doc",".pdf","zip","rar","xlsx");

 // Check extension dapat ang image file lang imuhang i check ani kay kuhaon man nimo siya sa array
 //if( in_array($name,$extensions_arr) ){
   
 	$sql ="SELECT * FROM chedaccount WHERE username = '$_SESSION[username]'";

   $result=$con->query($sql);
   if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {
      $cheddepartment = $row['department'];
      
    }

  //Insert record
    $query = "INSERT INTO chedfile values(null,'$cheddepartment','$sname','$sdepartment',now(),'$name')";
    //mysqli_query($con,$query);
    if ($con->query($query)) {
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    }

    
   //Upload file

  }
   else{
    }
  
//}
}



?>