<?php

//database
$databaseHost = "localhost";
$databaseName = "MyCharity";
$databaseUsername = "mycharity";
$databasePassword = "mycharity123";


//MySQLi Procedural
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// mysqli_connect_errno returns the last error code
if ( mysqli_connect_errno() ) {
	// die() is equivalent to exit()
	die( "Database connection failed: " . mysqli_connect_error() );
} 

 
?>