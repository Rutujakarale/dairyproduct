<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	//select db
	mysqli_select_db($conn, "phpdemo");	
	
	date_default_timezone_set("Asia/Kolkata");
    		
?>