<?php
/*******MySQLi******/

//Step 1: Connecting to a Database using MySQLi API (Object-Oriented approach)
// modify these variables for your installation
$servername = "localhost";
$username = "mycharity";
$password = "mycharity123";
$dbname = "mycharity";

$conn = new mysqli($servername, $username, $password, $dbname);


//Step 2: Handling Connection Errors - mysqli 
// Check connection (MySQLi object-oriented)


if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}

?>