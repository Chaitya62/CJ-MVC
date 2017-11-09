<?php
require_once(__DIR__.'/../model/TestModel.php');
require_once(__DIR__.'/../core/CJ_Controller.php');

class Test extends CJ_Controller{

	function __construct(){
		echo 'CLASS CREATED '."<br />";
		$this->test_model = new TestModel();
	}


	function test_get(){
		
		$this->load_view('home', array('content'=>'<h1>This content is sent from controller</h1>'));
	}

	function hello_get(...$args){
		
		$this->test_model->sayHello('CJ_MODEL');
	}


}

	



?>