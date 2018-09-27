<?php

$method = $_SERVER['REQUEST_METHOD'];
$id = $uri[3];
$switch = $uri[4];
if ($switch == "Y" || $switch == "N") {
	
	$result =  DB::raw("update announcement set is_active = '$switch' where id=$id");
	var_dump($uri);
}else{
	// header('HTTP/1.0 500');
 //    require 'blades/500.php';
var_dump($uri);
}
?>