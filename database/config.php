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

	function raw($query){
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

	function select($table,$fields = null,$conditions = null){
		$conn = DB::db_init();
		$query = !$conditions ? ("select * from $table") : ("select * from $table where $conditions");
		if ($fields) {
			$query = str_replace('*', join(",", $fields), $query);
		}
		
		$result = $conn->query($query);

		$result_array = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($result_array,$row);
			}
		}
		return json_encode($result_array);
	}

	function insert($table,$fields,$contents){
		if (sizeof($fields)!==sizeof($contents)) {
			return 500;
		}
		$conn = DB::init();
		$query = "insert into $table ";
		for ($i=0; $i < sizeof($fields); $i++) { 
			$query .= $fields[$i] . "='" . $contents[$i] ."'";
			
		}
	}

	function post($table,$contents){

	}

	function delete($table,$id){
		$conn = DB::db_init();
		$id = $conn->real_escape_string($id);
		$query = "DELETE from $table where id=$id";
		$result = $conn->query($query);
		return true;
	}
	function escape($string){
		$string = str_replace("'", "\'", $string);
		$string = str_replace(" ", "", $string);
	}
}
