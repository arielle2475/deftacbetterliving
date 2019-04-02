<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php


define (DB_USER, "root");
define (DB_PASSWORD, "");
define (DB_DATABASE, "thesis");
define (DB_HOST, "localhost");


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


?>