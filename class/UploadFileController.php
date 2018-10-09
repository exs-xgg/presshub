<?php
// session_start();
$user_id = $_SESSION['idx'];
$target_dir = "uploads/";
$target_file = $_FILES["fileToUpload"]["name"];
$real_file_name = $_FILES["fileToUpload"]["tmp_name"];
$private = $_POST['private'];
$target_file_masked = str_replace("'", "", $target_file);
$server_file_name =  $target_dir . basename($target_file_masked);
// echo shell_exec("ls");
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (move_uploaded_file($real_file_name,$server_file_name)) {
    	$result =  DB::insert("files",array("'$target_file_masked'",$user_id,"'$private'"),"file_name,user_id,private");
    	header("location: /dashboard/file?success=y");
    }else{
    	echo "Cant Upload";
    }
}else{
	echo "????";
}
?>
