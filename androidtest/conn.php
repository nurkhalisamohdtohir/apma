<?php
// Create 4 variables to store these information
$server="localhost";
$username="root";
$password="";
//database name
$database = "apparel_db";
// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>