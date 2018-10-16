<?php

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pw = base64_encode(md5("'".$_POST['password']."'"));
		$result = DB::select("users",null,"username='$user' and password='$pw'");
		if ($result!=='[]') {
			$result = json_decode($result);
			$_SESSION['json'] = $result;
			foreach ($result as $key) {
				if ($key->{"is_active"}=="N") {
					header('location: /login?incorrect=x');
				}
				$_SESSION['user'] = $key->{"first_name"}.' '.$key->{"middle_name"}.' '.$key->{"last_name"};
				$_SESSION['is_admin'] = $key->{"is_admin"};
				$_SESSION['idx'] = $key->{"id"};
				$_SESSION['designation'] = $key->{"designation"};
			}
			// echo $_SESSION['user'];

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'LOGIN','')");
			header("location: /dashboard");
		}else{

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'LOGIN','FAILED')");
			 header('location: /login?incorrect=y');

		}
	}else{
	//	header("location: /500");
	}