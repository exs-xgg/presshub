<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[sizeof($uri)-1];
switch ($method) {
	case 'GET':
		$result =  DB::select("user",["id"], (($id==null) ? "id =". $id : null));
		break;
	case 'POST':
		$contents = file_get_contents("php://input");
		echo ($contents);
		break;
	case 'PUT':
		$contents = file_get_contents("php://input");
		echo ($contents);
		break;
	case 'DELETE':
		DB::delete("user", (($id==null) ? "id =". $id : null));
		break;					
	default:
		return 500;
		break;
}

 echo($result);