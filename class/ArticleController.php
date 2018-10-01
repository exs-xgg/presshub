<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::select("article",null," id=". $id) : DB::select("article");
		echo "$result";
		break;
	case 'POST':
		if($id==null){
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
			echo (DB::insert("article", $data_to_catch,join(",", $fields))) ? true : false;
		}else{
			$result = DB::select("article",null,"issue_id=".$id);
			echo "$result";
		}
			
		break;


	case 'PUT':
		break;
	case 'DELETE':
		$result = DB::delete("article", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
