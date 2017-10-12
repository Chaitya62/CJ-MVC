<?php 
require_once(__DIR__.'/../core/CJ_Model.php');

class TestModel extends CJ_Model {

	function __construct(){
		parent::__construct();
		echo 'Test Model  CREATED '."<br />";
	}

	function sayHello($name){
		echo "You did it, ". $name;
	}


}

 ?>