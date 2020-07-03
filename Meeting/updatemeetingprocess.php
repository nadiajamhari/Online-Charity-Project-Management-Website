<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

include_once("config.php");

$meetingid = $_GET['id'];

$mname = $_POST["mname"];
$mdate = $_POST["mdate"];
$start = $_POST["start"];
$end = $_POST["end"];
$venue = $_POST["venue"];
$description = $_POST["description"];
  
  
$sql = "UPDATE meeting SET mname='$mname', mdate='$mdate', start='$start', end='$end', venue='$venue', description='$description' WHERE meetingID=$meetingid";
  
if ($conn->query($sql) === TRUE) {
  //echo "Record updated successfully 1";
} else {
  //echo "Error updating record: " . $conn->error;
}

$sql0 = "DELETE FROM plist WHERE meetingID='$meetingid'";
if( mysqli_query($conn, $sql0)){
  //echo "delete old record first";
}
else{
  $conn->rollback();
}

  //participant list
if(isset($_POST["pname"])){
  foreach ($_POST["pname"] as $pname){
    //echo "hello";
    $n[]=$pname;
  }
  $count = 0;
  while ($count<sizeof($n)){
    $sql1 = "INSERT INTO plist(meetingID,pname) VALUES ('$meetingid','$n[$count]')";
    //echo "insert $n[$count]";
    $count++;

    if($conn->query($sql1)===TRUE){
     
    }
    else{
      //echo "Error : ".$sql1. "<br>".$conn->error;
    }
    
  }
}


$conn->close();
echo "<html><script> window.location.href=\"viewmeeting.php?id=$meetingid\";</script></html>";
?>