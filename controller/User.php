<?php 

require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../core/CJ_Controller.php');

class User extends CJ_Controller{

function __construct(){
	echo 'user controller CLASS CREATED '."<br />";
	$this->model=new UserModel();

}

function hello_get(){
	echo "Hello, World!";
}


//http://localhost/CJ-MVC/index.php/User/getAll/
function getAll_get(){
	$result = $this->model->get_all();
	print_r($result);
	echo json_encode($result);
}


//http://localhost/CJ-MVC/index.php/User/get/2/
function get_get($id){

	$result = $this->model->get($id);
	echo json_encode($result);


}

}


 ?>