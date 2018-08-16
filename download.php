<?php
include "konek.php";

 // check if the download button is clicked 
 if ( isset($_POST['schoolfile'] )) { // check if the filename is set 
 $filename = ( isset($_POST["file"]) ? $_POST["doc"] : null ); // check if file is in the directory or on the server 
 if ( file_exists( $filename )) { // download the file from the server 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=filename here"); 
    header("Content-Length: " . filesize( $filename) ); 
    header("Cache-Control: must-revalidate"); 
    readfile( $filename ); exit; } }
?>
