<?php


	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user = $_POST['username'];
		$pw = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$result = DB::select("user",["first_name", "last_name", "middle_name", "designation"],"username='$user' and password='$pw'");
		if ($result!=='[]') {
			$_SESSION['user'] = $result;
		}else{
			header("location: /500");
		}
	}else{
		header("location: /500");
	}