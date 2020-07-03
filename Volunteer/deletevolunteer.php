<?php

include_once('config.php');
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$id=$_POST['delete_id'];

$sql = " DELETE FROM volunteer WHERE idnumber = '$id' ";


if($conn->query($sql)){
    echo"<html><script> window.location.href=\"viewvolunteer.php\";</script></html>";
}
else{
    echo "Cannot Delete". $conn->error;
}
$conn->close();




?>