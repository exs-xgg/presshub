<?php


	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pw = base64_encode(md5("'".$_POST['password']."'"));
		$result = DB::select("users",["first_name", "last_name", "middle_name", "designation"],"username='$user' and password='$pw'");
		if ($result!=='[]') {
			$_SESSION['user'] = $result;
			header("location: /dashboard");
		}else{
			 header('HTTP/1.0 500');
         require 'blades/500.php';
		}
	}else{
	//	header("location: /500");
	}