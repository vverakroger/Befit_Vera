<?php
	$server = 'localhost:3308';
	$username = 'root';
	$password = '';
	$database = 'befit';

try {
	$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
	die('Connection failed: '.$error->getMessage());
}
	
?>