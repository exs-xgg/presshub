<?php

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pw = base64_encode(md5("'".$_POST['password']."'"));
		$result = DB::select("users",null,"username='$user' and password='$pw' and is_active='Y'");
		if ($result!=='[]') {
			$result = json_decode($result);
			$_SESSION['json'] = $result;
			foreach ($result as $key) {
				$_SESSION['user'] = $key->{"first_name"}.' '.$key->{"middle_name"}.' '.$key->{"last_name"};
				$_SESSION['is_admin'] = $key->{"is_admin"};
				$_SESSION['idx'] = $key->{"id"};
				$_SESSION['designation'] = $key->{"designation"};
			}
			// echo $_SESSION['user'];
			header("location: /dashboard");
		}else{
			 header('location: /login?incorrect=y');
		}
	}else{
	//	header("location: /500");
	}