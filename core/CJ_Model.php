<?php
require_once(__DIR__.'/database/CJ_Connection.php');

class CJ_Model{

	function __construct(){
		$db = new CJ_Connection();
		$this->connection =  $db->getConnection();
	}

	function select(){
		$sql = "SELECT * FROM user;";
		$result = $this->connection->query($sql);
		return $result;
	}
}


?>