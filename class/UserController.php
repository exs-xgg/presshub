<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::select("users",null," id=". $id) : DB::select("users");
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
		echo (DB::insert("users", $data_to_catch,$fields)) ? true : false;
		
		break;
	case 'PUT':
		$contents = file_get_contents("php://input");
		$data_to_catch = array();
		$data_to_insert = array();
		$data_to_insert = json_decode(($contents));
		$fields = array();
		foreach ($data_to_insert as $key1) {
				foreach ($key1 as $key2 => $value) {
				
				array_push($data_to_catch, "$value");
				array_push($fields, $key2);
				
			}
		}
			// $fields = "first_name,middle_name,last_name,designation,contact_no,email_addr,username,password,is_admin";
		echo (DB::update("users", join(",",$data_to_catch),join(",", $fields),"id=".$id));
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