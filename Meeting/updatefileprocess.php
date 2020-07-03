<?php
include_once("config.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$meetingid = $_GET['id'];

if(isset($_POST['save'])){

    if($_FILES['file']['name'] == null){
      
    }
    else{
      $sql2 = "DELETE FROM files WHERE meetingID=$meetingid";
      if( mysqli_query($conn, $sql2)){
        //echo "delete old file first";
      }
      else{
        $conn->rollback();
      }

      $uploads_dir = 'uploads/';
      
      $filename = $_FILES['file']['name'];
      $size = $_FILES['file']['size'];
      $destination = $uploads_dir . $filename; 
    //   if ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    //   echo "File too large!";
    //   }
    if (is_uploaded_file($_FILES['file']['tmp_name'])){  
          $sql4 = "INSERT INTO files (meetingID,name, size, downloads) VALUES ('$meetingid','$filename', $size, 0)";   
          if (mysqli_query($conn, $sql4)) {
              //echo $filename;
              //echo "File uploaded successfully go into database";
          }
          else{
              //echo "failed go to database";
          }  
      //in case you want to move  the file in uploads directory
      move_uploaded_file($_FILES['file']['tmp_name'], $uploads_dir.$filename);
      //echo 'moved file to destination directory';
      //echo "<html><script> window.location.href=\"updatefile.php?id=$meetingid\";</script></html>";
      }
    }
}
if(isset($_POST['delete'])){
    $sql2 = "DELETE FROM files WHERE meetingID=$meetingid";
    if( mysqli_query($conn, $sql2)){
        //echo "delete old file first";
    }
    else{
    $conn->rollback();
    }
}
  $conn->close();
  echo "<html><script> window.location.href=\"updatefile.php?id=$meetingid\";</script></html>";
?>