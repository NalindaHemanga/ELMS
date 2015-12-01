
<?php

session_start();


$GLOBALS['config'] = array(

	'mysql' => array(
		
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db' => 'electronicdb'
		
		),
	
	'session' => array(

		'session_name' => 'user'

		)
	);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

?>