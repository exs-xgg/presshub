<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
DB::raw("INSERT INTO `actions`(`user`,`method`, `module`) VALUES (1,'".$uri[4]."','FORGOT ATTEMPT". (isset($uri[3]) ? "(".$uri[3].")" : "")."')");
switch ($method) {
	case 'GET':
		$result = DB::select("users",null,"username='" . $id ."' and answer='" . base64_decode($uri[4]) . "'");
		$fn = "";
		$ln = "";
		$cn = "";
		if ($result!=="[]") {
			$ar = json_decode($result);
			var_dump($ar);
			foreach ( $ar as $key) {
				$fn = $key->{'first_name'};
				$ln =  $key->{'last_name'};
				$cn =  $key->{'contact_no'};
			
			}
			//GENERATE RANDOM STRING
			$characters = '0123456789';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < 6; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }

		    $_SESSION['forgot_key'] = $randomString;
			DB::raw("update users set reset=1, password='".base64_encode(md5("'$randomString'"))."' where username like '".$id."'");

			$ch = curl_init();
			$parameters = array(
			    'apikey' => '200f074fcdcf72ad77770834757aacd2', //Your API KEY
			    'number' => $cn,
			    'message' => '[PRESSHUB]' . $fn . " " . $ln . ', your temporary reset password is ' . $randomString ,
			    'sendername' => 'XNOTIFY'
			);
			curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
			curl_setopt( $ch, CURLOPT_POST, 1 );

			//Send the parameters set above with the request
			curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

			// Receive response from server
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			$output = curl_exec( $ch );
			curl_close ($ch);

			echo $output;
			
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
