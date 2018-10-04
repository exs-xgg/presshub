<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
switch ($method) {
	case 'GET':
		$result =  ($id!==null) ? DB::raw("select a.id as id, a.name as article_name, a.date_created as date_created, a.deadline as deadline, i.nickname as issue from user_article ua inner join article a on ua.article=a.id inner join issue i on a.issue_id = i.id where user=" . $id):null;
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
