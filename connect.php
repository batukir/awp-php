<?php
function ConnectDB() {
	$hostname = '127.0.0.1';
	$username = '';
	$password = '';
	$dbname = '';

	try {
		$dbh = new PDO("mysql:$hostname;dbname=$dbname", 
                               $username, $password);
	}
	catch(PDOException $e) {
		die ('PDO error in "ConnectDB()": ' . $e->getMessage() );
	}
	
	return $dbh;
}

?>
