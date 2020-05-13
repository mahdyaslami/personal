<?php
use Medoo\Medoo;

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'cp38990_ps',
	'server' => 'localhost',
	'username' => 'cp38990_dbapi',
	'password' => 'J7-#UglItb@B',
 
	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306,
 
	// [optional] Enable logging (Logging is disabled by default for better performance)
	'logging' => true,
 
	// [optional] MySQL socket (shouldn't be used with server and port)
	'socket' => '/tmp/mysql.sock',
 
	// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL,
		PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	],
 
	// [optional] Medoo will execute those commands after connected to the database for initialization
	'command' => [
		'SET SQL_MODE=ANSI_QUOTES'
	]
]);