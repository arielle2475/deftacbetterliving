<?php

//database_connection.php

$connect = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');


// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "thesis";


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
