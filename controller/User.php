<?php 

require_once(__DIR__.'/../test_core/CJ_Model.php');
require_once(__DIR__.'/../model/UserModel.php');

class User{

function __construct(){
	echo 'user controller CLASS CREATED '."<br />";
	$this->model=new UserModel();

}

function hello(){
	echo "Hello, World!";
}


//http://localhost/CJ-MVC/index.php/User/getAll/
function getAll(){
	$result = $this->model->get_all();
	echo json_encode($result);
}


//http://localhost/CJ-MVC/index.php/User/get/2/
function get($id){

	$result = $this->model->get($id);
	echo json_encode($result);


}

}


 ?>