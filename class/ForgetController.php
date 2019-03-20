<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (1,'".$uri[4]."','FORGOT ATTEMPT". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
switch ($method) {
	case 'GET':
		$result = DB::select("users",null,"username='" . $id ."' and answer='" . base64_decode($uri[4]) . "'");

		if ($result!=="[]") {


			//GENERATE RANDOM STRING
			$characters = '0123456789';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < 6; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }

		    $_SESSION['forgot_key'] = $randomString;
			DB::raw("update users set reset=1, password='".base64_encode(md5("'$randomString'"))."' where username like '".$id."'");
			
			header("location: /forgot?pass=true");
		}else{
			header("location: /forgot?pass=fail");
		}
		break;
	case 'POST':	
		
		break;


	case 'PUT':
		$contents = json_decode(file_get_contents("php://input"),true);
		$column = array();
		$cont_ = array();
		$conditions = "id=" . $id;
		foreach ($contents as $key1) {
			foreach ($key1 as $key2 => $value) {
				// echo ($key2)." = $value\n";
				if ($key2=="password") {
					$value = "'".base64_encode((md5($value)))."'";

				}
				array_push($column, $key2);
				array_push($cont_, $value);
			}
		}
		// echo "\n";
		echo DB::update("users", join(",",$cont_), join(",",$column), $conditions);
		break;
	case 'DELETE':
		break;				
	default:
		return 500;
		break;
}
