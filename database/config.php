<?php

//DATABASE VARIABLES
Class DB{
	

	public $conn = "";
	function db_init(){
		$SERVER_ADDRESS = "localhost";
		$DATABASE_USER = "root";
		$DATABASE_PASSWORD = "";
		$DATABASE_NAME = "sanjose_users";
		return mysqli_connect($SERVER_ADDRESS,$DATABASE_USER,$DATABASE_PASSWORD,$DATABASE_NAME);
	}

	function select($query){
		$conn = DB::db_init();
		$result = $conn->query($query);
		$result_array = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($result_array,$row);
			}
		}
		return json_encode($result_array);
	}
}
