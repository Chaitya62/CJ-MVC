<?php

require_once(__DIR__.'/database/CJ_Connection.php');
//do not return anything if on error // now returning ERROR at blah blah
class CJ_Model{

	function __construct(){
		echo 'CJ_Model class created <br>';
		$db = new CJ_Connection();
		$this->connection =  $db->getConnection();
	}
	
	function create($tableName,$insertWhat){

		$sql='INSERT INTO '.$tableName.'(';
		foreach ($insertWhat as $key => $value)
			$sql .= $key.',';
		
		  $sql=rtrim($sql,',');
		  $sql.=')';
		$sql.=' VALUES(';
		
		foreach ($insertWhat as $key => $value)
			$sql .= '\''.$value.'\',';
		
		  $sql=rtrim($sql,',');
		  $sql.=')';

		  $sql=$this->appendSemicolon($sql);
		echo $sql.'<br>';

	   $result = $this->connection->query($sql);
		if($result)
			return $result;
		else
			return 'Error at CJ_MODEL/create'; 
	}

	/*
		****tablename necessary !
		$tableName => 'users'
		
		****what to read
		 use accorgingly if all read / read particular column	
		$args => array('*') / array('username','email')
		
		****optional arg (call with null argument to avoid warnings)
		//for where clause
		$whereArgs => array( 'username' => 'jigar_wala') 
	*/

	function read($tableName,$args,$whereArgs){
	
		  $sql='SELECT ';

		 foreach ($args as $key => $value)
		  	 $sql.=$value.',';
		  $sql=rtrim($sql,',');
	   $sql.=' FROM '.$tableName;
	 
	   if($whereArgs)
		$sql= $this->where($sql,$whereArgs);	

	   $sql=$this->appendSemicolon($sql);
	   echo $sql.'<br>';
		$finale=array();

		$result = $this->connection->query($sql);
		if($result){
		while($row=mysqli_fetch_assoc($result))
			array_push($finale,$row);
		return $finale;
		}
		else
			return 'Error at CJ_MODEL/read';
		
	}
    function update($tableName,$whatToSet,$whereArgs){
    	$sql='UPDATE '.$tableName .' SET ';
    	foreach ($whatToSet as $key => $value)
    		$sql .= $key .'=\'' . $value . '\',';
    	$sql=rtrim($sql,',');

	   if($whereArgs)
		$sql= $this->where($sql,$whereArgs);	
		$sql=$this->appendSemicolon($sql);
    	echo $sql.'<br>';
	  $result = $this->connection->query($sql);

		if($result)
			return $result;
		else
			return 'Error at CJ_MODEL/update';

    }
   function delete($tableName,$whereArgs){
   		$sql='DELETE FROM '.$tableName;

	   if($whereArgs)
	   	$sql=$this->where($sql,$whereArgs);
	   $sql=$this->appendSemicolon($sql);
	   echo $sql.'<br>';
	   $result = $this->connection->query($sql);

		if($result)
			return $result;
		else
			return 'Error at CJ_MODEL/delete'; 


   }

    function where($sql,$whereArgs){
    	$sql.=' WHERE ';
    	
    	foreach ($whereArgs as $key => $value)
    		$sql.=$key.' = \''.$value.'\' AND ';
    	$sql=rtrim($sql,'AND ');
    	      	
    	return $sql;
    }

	function appendSemicolon($sql){
		if(substr($sql,-1)!=';')
			return $sql.' ;';	
	}
}


// $obj=new CJ_Model();

// $where['id']='3';
// $where['evw']=2;

// $rows=call_user_func_array(array($obj, 'create'), array('questions',array('user_id'=>1,'what'=>'isko insert karna he?')));
// $rows=call_user_func_array(array($obj, 'read'), array('users',array('*'),null));
// $rows=call_user_func_array(array($obj, 'update'), array('questions',array('what'=>'is science related to math?'),$where));
// $rows=call_user_func_array(array($obj, 'delete'), array('questions',$where));
// echo '<br>';
// print_r($rows)
// print_r(get_class_methods ( 'CJ_Model' ));


?>