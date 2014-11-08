<?php
	
	//Facebook app Config
if(App::environment('local')){
	$array =  array(
		'appId' => '963052813708377',
		'secret' => 'b3b7503453dfa3ab8701c8601cbd5db5'
	);
}

if(App::environment('heroku')){
	$array = array(
		'appId' => '',
		'secret' => ''
	);
}

return $array;