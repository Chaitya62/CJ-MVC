<?php 

$url = parse_url($_SERVER['REQUEST_URI']);
print_r($url);


$result = split('/', $url['path']);
print_r($result);



function getArgumentStart($uri){
	foreach ($uri as $key => $value){
		if($value == 'index.php'){
			if($key == count($uri) - 1 ) return -1;
			return $key+1;
		}
	}
}

$function_name = $result[getArgumentStart($result)];

$arr = get_class_methods ( 'TEST' );

print_r($arr);

//print_r($arr['user'][1]());

function hello($a, $b){

	echo "Hello, World";
	return true;
};



class TEST{

	function __construct(){
		echo "TEST CREAITED";
	}

	function asdf($a, $b){
		echo "<br />"."Inside test";
	}
}



//$r = new TEST();


call_user_func_array(array(new TEST, 'asdf'), array('argument1', 'argument2'));




function hello12(){

	echo "Hello, World";

};

//$fun();
// $$function_name;







?>