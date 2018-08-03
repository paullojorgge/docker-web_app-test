<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli('mysql', 'root', 'admin','bocker');
		if ($conn->connect_error) {
			echo $conn->connect_error;
    			#die("Database connection failed: " . $conn->connect_error);
		}
		
?>
