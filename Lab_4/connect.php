<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'pailab4';
	$conn = mysql_connect($host, $user, $pass);
	if(!$conn){
		die('Error: '.mysql_error());
	}
	$db = mysql_select_db($db, $conn);
	if(!$db){
		die('Error: '.mysql_error());
	}
	
	session_start();
?>