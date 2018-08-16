<?php  

include "konek.php";

if (isset($_POST['apprv'])) {
	$file_id = mysqli_real_escape_string($con,$_POST['file_id']);

	//$sql = "UPDATE chedfile set status = 'APPROVED' where chedfile"

	echo "With file id: ".$file_id;
}
else if (isset($_POST['disapprv'])) {
	$file_id = mysqli_real_escape_string($con,$_POST['file_id']);

	echo "With file id: ".$file_id;
}


?>