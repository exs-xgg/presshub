<?php
$method = $_SERVER['REQUEST_METHOD'];

DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'".$method."','ARTICLE-TYPE". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
$cat = $uri[3];
$id = $uri[4];
switch ($method) {
	case 'GET':
		$result =  DB::select("article",null,"cat_id like '$cat' and issue_id=". $id . " order by date_updated desc");
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
			// $fields = "first_name,middle_name,last_name,meeting,contact_no,email_addr,username,password,is_admin";
		echo (DB::insert("meeting", $data_to_catch,join(",", $fields))) ? true : false;
		break;


	case 'PUT':
		break;
	case 'DELETE':
		$result = DB::delete("meeting", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
