<?php
require(__DIR__.'/../model/TestModel.php');

class Test{

	function __construct(){
		echo 'CLASS CREATED '."<br />";
		$this->test_model = new TestModel();
	}

	function hello($name){
		$result = $this->test_model->select();
		while($row = $result->fetch_assoc()){
			print_r($row);
			echo "<br/>";
		}
	}


}

	



?>