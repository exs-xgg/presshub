<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[sizeof($uri)-1];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::select("user",["id","last_name"]," id=". $id) : DB::select("user",["id","last_name"]);
		echo "$result";
		break;
	case 'POST':
		$contents = file_get_contents("php://input");
		$data_to_catch = array();
		$data_to_insert = json_decode($contents);
		foreach ($data_to_insert as $key1) {
			foreach ($key1 as $key2 => $value) {
				array_push($data_to_catch, $value);
			}
		}
		echo DB::insert("user", $data_to_catch);
		
		break;
	case 'PUT':
		$contents = json_decode(file_get_contents("php://input"),true);
		$column = array();
		$cont_ = array();
		$conditions = "id=" . $id;
		foreach ($contents as $key1) {
			foreach ($key1 as $key2 => $value) {
				// echo ($key2)." = $value\n";
				array_push($column, $key2);
				array_push($cont_, $value);
			}
		}
		// echo "\n";
		echo DB::update("user", $column, $cont_, $conditions);
		break;
	case 'DELETE':
		DB::delete("user", (($id==null) ? "id =". $id : null));
		break;					
	default:
		return 500;
		break;
}


function a(){
	echo 'a';
}

 // echo($result);