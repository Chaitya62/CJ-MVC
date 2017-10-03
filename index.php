<?php 
// include all controllers here
require('./controller/Test.php');


// call the controllers using 
// domain(localhost)/app_name/index.php/Controller_name/function/args..../



function getArgumentStart($uri){
		foreach ($uri as $key => $value){
			if($value == 'index.php'){
				if($key == count($uri) - 1 ) return -1;
				return $key+1;
			}
		}
}


function main(){
	$uri = parse_url($_SERVER['REQUEST_URI']);
	$parameters = split('/', $uri['path']);
	// get query using $uri['query'] // TODO

	$start = getArgumentStart($parameters);
	if($start != -1){
		$controller_name = $parameters[$start];
		
		 $function_name = $parameters[$start+1];
		$start+=2;
		$args = array();
		for(;$start < count($parameters); $start++){
			array_push($args, $parameters[$start]);
		}
		call_user_func_array(array(new $controller_name, $function_name), $args);

	}else{
		echo "404 not found";
	}

	
}

main();



?>