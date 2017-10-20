<?php
require_once(__DIR__.'/../model/TestModel.php');

class Test{

	function __construct(){
		echo 'CLASS CREATED '."<br />";
		$this->test_model = new TestModel();
	}

	function hello(...$args){
		$result = $this->test_model->select();
		while($row = $result->fetch_assoc()){
			print_r($args);

			echo "<br/>";
		}
	}


}

	



?>