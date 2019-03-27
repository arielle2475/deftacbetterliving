<?php
	
	//Create String variable for host name
	$db_server_name = "localhost";
	
	//Create String variable for username
	$db_username = "root";
	//Create String variable for password
	$db_password = "";
	
	//Create String variable for database name
	$db_name = "thesis";
	// Create connection
	$data = new mysqli($db_server_name, $db_username, $db_password, $db_name);