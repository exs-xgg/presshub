<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		break;
	case 'POST':
		$contents = file_get_contents("php://input");
		echo $contents;
		break;
	case 'PUT':
		$contents = file_get_contents("php://input");
		echo $contents;
		break;
	case 'DELETE':
		break;				
	default:
		return 500;
		break;
}
