<?php
function ConnectDB() {
	$hostname = '127.0.0.1';
	$username = 'username';
	$password = 'password';
	$dbname = 'username';

	$dbh = mysqli_connect($hostname, $username, $password, $dbname);
	
	return $dbh;
}

?>
