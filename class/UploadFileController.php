<?php
include '../database/config.php';
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (move_uploaded_file($file,$server_file_name)) {
    	DB::insert("files","'$filename'",null);
    }
}
?>
