<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		$result =  DB::raw("select * from meeting inner join minutes on meeting.id = minutes.meeting_id where meeting.id=".$id);
		echo "$result";
		break;
	case 'POST':
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
		echo (DB::insert("designation", $data_to_catch,join(",", $fields))) ? true : false;
		break;


	case 'PUT':
		break;
	case 'DELETE':
		$result = DB::delete("designation", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}