<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::select("users",["id","last_name"]," id=". $id) : DB::select("users");
		echo "$result";
		break;
	case 'POST':
		$contents = file_get_contents("php://input");
		$data_to_catch = array();
		$data_to_insert = array();
		$data_to_insert = json_decode(($contents));

		foreach ($data_to_insert as $key1) {
				foreach ($key1 as $key2 => $value) {
				if ($key2=="password") {
					$value = "'".base64_encode((md5($value)))."'";

				}
				array_push($data_to_catch, "$value");
				}
		}
		$fields = "first_name,middle_name,last_name,designation,contact_no,email_addr,username,password,is_admin";
		echo (DB::insert("users", $data_to_catch,$fields)) ? "WAAAW" : "NGEK";
		
		break;
	case 'PUT':
		$contents = json_decode(file_get_contents("php://input"),true);
		$contents = str_replace("[", "", $contents);
		$contents = str_replace("]", "", $contents);
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
		echo DB::update("users", $column, $cont_, $conditions);
		break;
	case 'DELETE':
		DB::delete("users", (($id==null) ? "id =". $id : null));
		break;					
	default:
		return 500;
		break;
}


function a(){
	echo 'a';
}

 // echo($result);