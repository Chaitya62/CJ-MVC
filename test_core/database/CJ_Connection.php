<?php 


class CJ_Connection{


	function __construct(){
		require_once(__DIR__.'/../../config/database.php');
		$this->db_params = $db_params;

	}


	function getConnection(){

		$conn = new mysqli($this->db_params['servername'],$this->db_params['username'],$this->db_params['password'],$this->db_params['dbname']);
		if($conn->connect_error){
			die("Connection Faild: ". $conn->connect_error);
		}
	/*	else
			echo 'connection established<br>';*/
		return $conn;
	}


}




?>