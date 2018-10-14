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
// $banned = array("php","mov", "mp4","docx");
// $ext = explode(".", $real_file_name);
// if (in_array($ext[(sizeof($ext)-1)], $banned)) {
// 	header("location: /dashboard/file?success=n");
// 	return 0;
// }
$desc = strip_tags($_POST['desc']);
if(isset($_POST["submit"])) {
    if (move_uploaded_file($real_file_name,$server_file_name)) {
    	$result =  DB::insert("files",array("'$target_file_masked'",$user_id,"'$private','$desc'"),"file_name,user_id,private,description");

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'FILE','UPLOAD')");
    	header("location: /dashboard/myfile?success=y");
    }else{
    	echo "Cant Upload";
    }
}else{
	echo "????";
}
?>
