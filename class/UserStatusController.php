<?php

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pw = base64_encode(md5("'".$_POST['password']."'"));
		$result = DB::select("users",["id","is_admin","first_name",  "middle_name", "last_name", "designation"],"username='$user' and password='$pw'");
		if ($result!=='[]') {
			$result = json_decode($result);
			$_SESSION['json'] = $result;
			foreach ($result as $key) {
				$_SESSION['user'] = $key->{"first_name"}.' '.$key->{"middle_name"}.' '.$key->{"last_name"};
				$_SESSION['is_admin'] = $key->{"is_admin"};
				$_SESSION['idx'] = "".$key->{"id"};
			}
			// echo $_SESSION['user'];
			header("location: /dashboard");
		}else{
			 header('HTTP/1.0 500');
         require 'blades/500.php';
		}
	}else{
	//	header("location: /500");
	}