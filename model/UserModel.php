<?php 

require_once(__DIR__.'/../test_core/CJ_Model.php');
class UserModel extends CJ_Model{

	function get_all(){
		return $this->read('users',array('*'),null);
	}

	function get($id){
		return $this->read('users', array('*'), array('id'=>$id));
	}
}
 ?>