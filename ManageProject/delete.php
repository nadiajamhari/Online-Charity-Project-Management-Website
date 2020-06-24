<?php
include_once ("pconfig.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

// if(isset($_POST['deleteproject'])){
  $id = $_GET['id'];
  $sql5 = "DELETE from project where projectID=$id";
  if($conn->query($sql5)){
      // echo "all delete";
  }
  else{
    echo "Error deleting record: " . $conn->error;
  }
  echo "<html><script> window.location.href=\"project.php\";</script></html>";
// }

$conn->close();
?>