<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (1,'".$uri[4]."','FORGOT ATTEMPT". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
switch ($method) {
	case 'GET':
		$result = DB::select("users",null,"username='" . $id ."' and answer='" . base64_decode($uri[4]) . "'");

		if ($result!=="[]") {
			DB::raw("update users set password='".base64_encode(md5("''"))."' where username='".$id."'");
			header("location: /forgot?pass=true");
		}else{
			header("location: /forgot?pass=fail");
		}
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
		echo (DB::insert("user_article", $data_to_catch,join(",", $fields))) ;
		break;


	case 'PUT':
		break;
	case 'DELETE':
		$result = DB::delete("user_article", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
