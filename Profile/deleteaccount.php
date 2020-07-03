<?php
include_once("dbconnect.php");
$userID=$_GET['id'];

$sql = "DELETE from profile where userID=$userID";
if (mysqli_query($conn, $sql)) {

	$message = "Succesfully Delete, Goodbye!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<html><script> window.location.href=\"../IndexLoginSignup/index.html\";</script></html>";
}


?>