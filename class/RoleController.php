<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[4];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::select("designation",["id","description"]," id=". $id) : DB::select("designation",["id","description"]);
		echo "$result";
		break;
	case 'POST':
		$contents = file_get_contents("php://input");
		// $data_to_catch = array();
		// $data_to_insert = array();
		// $data_to_insert = json_decode(($contents));
		// $role = '';
		// foreach ($data_to_insert as $key1) {
		// 		foreach ($key1 as $key2 => $value) {
		// 			$role = $value;
		// 		}
		// 	}
		$contents = strtoupper(str_replace('"', '', $contents));
		$result = DB::insert("designation",["'".((substr($contents,0,3)))."'","'$contents'"],"id,description");
		echo "$result";
		break;
	case 'PUT':
		
		break;
	case 'DELETE':
		
		break;					
	default:
		return 500;
		break;
}
