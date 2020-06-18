<?php
$servername = "localhost";
$username = "mycharity";
$password = "mycharity123";
$dbname = "mycharity";

//create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);

//check connection
if ($conn->connect_error){
    die("Connection failed :" . mysqli_connect_error());
}
// echo "Connected Successfuly";

?>