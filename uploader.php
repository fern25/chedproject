<?php  

session_start();
include "konek.php";


if(isset($_POST['sendfile'])){
 


 $name = str_replace(" ", "",$_FILES['file']['name']);
 $target_dir = "schoolfile/";
 $target_file = $target_dir . str_replace(" ","",basename($_FILES['file']['name']));
 $sname = "";
 $sdepartment = "";
 $fullname = "";


    //move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array(".doc",".pdf",".zip",".rar",".xlsx");

 // Check extension dapat ang image file lang imuhang i check ani kay kuhaon man nimo siya sa array
 //if( in_array($name,$extensions_arr) ){
   
 	$sql ="SELECT * FROM schoolaccount WHERE suser = '$_SESSION[suser]'";

   $result=$con->query($sql);
   if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {

      $sname = $row['schoolname'];
      $sdepartment = $row['schooldepartment'];
      $fullname = $row['fullname'];
    }

  //Insert record
    $query = "INSERT INTO schoolfile values(null,'$sname','$sdepartment','$fullname',now(),'$name')";
    
    if ($con->query($query)) {
      echo "success";
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    }

    
   //Upload file

  }
   else{
    }
  
//}
}



?>