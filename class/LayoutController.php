<?php
$method = $_SERVER['REQUEST_METHOD'];

// DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (".$_SESSION['idx'].",'".$method."','LAYOUT". (isset($uri[2]) ? "(".$uri[1].")" : "")."')");
$id = $uri[3];
// echo $id;
switch ($method) {
	case 'GET':
		$result =  DB::select("layout",null,"issue_id=".$id);
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
		var_dump($data_to_catch);
		echo (DB::insert("layout", $data_to_catch,join(",", $fields))) ? true : false;
		break;


	case 'PUT':
	$contents = json_decode(file_get_contents("php://input"),true);
		$column = array();
		$cont_ = array();
		$id = $uri[3];
		$conditions = " issue_id=" . $id;
		var_dump ($contents);
		foreach ($contents as $key1) {
			$a = $key1['body'];
			echo DB::raw("update layout set body=" . $key1['body'] ." where " . $conditions);
		}
		break;
	case 'DELETE':
		$result = DB::delete("layout", $id);
		echo "$result";
		break;				
	default:
		return 500;
		break;
}
