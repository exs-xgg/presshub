<?php
// session_start();
$user_id = $_SESSION['idx'];
$target_dir = "uploads/";
$real_file_name = $_FILES["headerpic"]["tmp_name"];
$thename = $_FILES["headerpic"]["name"];
$server_file_name =  $target_dir . basename($thename);
$id = $_POST['id'];

$allowed = array("jpg","jpeg","png");
$ext = explode(".", $thename);
// echo $id;
if (in_array($ext[(sizeof($ext)-1)], $allowed)) {
	if(isset($_POST["submit"]) || true) { //bypass this on purpose
		
	    if (move_uploaded_file($real_file_name,$server_file_name)) {
	    	$result =  DB::update("layout","'/$server_file_name'","img_url","issue_id=".$id);
	    	echo $result;
	    }else{
	    	echo "Cant Upload";
	    }
	}else{
		echo "????";
	}
}else{
	echo "eh?";
}


?>
