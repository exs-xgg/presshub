<?php

$method = $_SERVER['REQUEST_METHOD'];
DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'".$uri[4]."','FORGOT PASSWORD". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
$id = $uri[3];
switch ($method) {
	case 'GET':
		// $result =  DB::select("users",null," username = '". $uri[3]. "'");
		$result = DB::raw("select * from users inner join questions on users.question_id=questions.id where username = '". $uri[3]. "'");
		echo $result;
		break;
	case 'POST':
		$result =  DB::select("questions",null," id = '". $uri[3]. "'");
		echo $result;
		break;
	default:
		return 403;
		break;
}
