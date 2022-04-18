<?php

//make sure you create a table in mysql name 'Users' with id(primary key, auto increment), username, password, and email column names.
function ConnectDB() {
	$hostname = '127.0.0.1';
	$username = 'username';
	$password = 'password';
	$dbname = 'username';

	$dbh = mysqli_connect($hostname, $username, $password, $dbname);
	
	return $dbh;
}

?>
