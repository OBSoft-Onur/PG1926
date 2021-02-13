<?php 




$host = 'localhost';
$user = 'root';
$pass = '';
$data = 'google_db';

try {
	$pdo = new PDO('mysql:host='.$host.';dbname='.$data.';charset=utf8', $user, $pass);
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage();
}

 ?>