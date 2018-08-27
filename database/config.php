<?php

//DATABASE VARIABLES
Class DB{
	

	public $conn = "";
	function db_init(){
		$SERVER_ADDRESS = "localhost";
		$DATABASE_USER = "root";
		$DATABASE_PASSWORD = "";
		$DATABASE_NAME = "presshub";
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
		$query = !isset($conditions) ? ("select * from $table") : ("select * from $table where $conditions");
		if ($fields !==null) {
			$query = str_replace('*', join(",", $fields), $query);
		}
		
		$result = $conn->query($query);

		$result_array = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($result_array,$row);
			}
		}
		// return $query;
		return json_encode($result_array);
	}

	function insert($table,$contents,$fields=null){
		$conn = DB::db_init();
		$query = "insert into $table ($fields) values(" .join(',',$contents) . ")";
		// return $query;
		return   $conn->query($query) ?  true :  false; 
	}

	function update($table,$column,$content,$conditions){
		if (sizeof($column) !== sizeof($content)){ return false; }
		$conn = DB::db_init();
		$query = "update $table set ";
		for ($i=0; $i < sizeof($column); $i++) { 
			$query .= $column[$i] . "=" . $content[$i];
			if ($i < sizeof($column)-1) {
				$query .= ",";
			}
		}
		$query .= " where " . $conditions;
		return $query;

	}

	function delete($table,$id){
		$conn = DB::db_init();
		// $id = $conn->real_escape_string($id);
		$query = "DELETE from $table where id=$id";
		$result = $conn->query($query);
		return $query;
	}
	function escape($string){
		$string = str_replace("'", "\'", $string);
		$string = str_replace(" ", "", $string);
	}
}
