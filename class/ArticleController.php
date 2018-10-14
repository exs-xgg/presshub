<?php

$method = $_SERVER['REQUEST_METHOD'];
DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'".$method."','ARTICLE')");
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
	if ($id!=="cp") {
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
		// var_dump($data_to_catch);
		// var_dump($fields);
			// $fields = "first_name,middle_name,last_name,designation,contact_no,email_addr,username,password,is_admin";
		echo (DB::update("article", join(",",$data_to_catch),join(",", $fields)," id=".$id));
	}else{
		$ar_id = $uri[4];
		$contents = file_get_contents("php://input");
		$data_to_catch = array();
		$data_to_insert = array();
		$data_to_insert = json_decode(($contents));
		$fields = array();
		$b64 = "";
		foreach ($data_to_insert as $key1) {
				foreach ($key1 as $key2 => $value) {
					$b64 = "$value";
					// echo "$b64";
				}
			}
		echo DB::raw("update article set copyread=".$b64.", is_done='N' where id=".$ar_id);
	}
		
		break;
	case 'DELETE':
		$result = DB::delete("article", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
