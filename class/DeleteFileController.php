<?php
$method = $_SERVER['REQUEST_METHOD'];

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'FILE','DELETE". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
$id = $uri[3];
switch ($method) {
	
	case 'DELETE':
		$result = DB::raw("delete from files where id=" . $id . "");
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
