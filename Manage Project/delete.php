<?php
include_once ("pconfig.php");

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

// if(isset($_POST['deleteob'])){
//   $objectiveID = $_POST['deleteID'];
//   $projectID = $_POST['projectID'];


//   $sql = "DELETE from objective where objectiveID=$objectiveID";
//   $result=$conn->query($sql);
//   if ($conn->query($sql)){
//     echo "berjaya";
//    echo "<html><script> window.location.href=\"editproject.php?id=$projectID\";</script></html>";
//   }
//   else{
//     echo "ERROR DELETING RECORD" .$conn->error;
//   }
// }


// if(isset($_POST['deleteco'])){

//   $listID = $_POST['deleteID'];
  
//   $projectID = $_POST['projectID'];


//   $sql = "DELETE from list_committee where listID=$listID";
//   $result=$conn->query($sql);
//   if ($conn->query($sql)){
//     echo "berjaya";
//    echo "<html><script> window.location.href=\"editproject.php?id=$projectID\";</script></html>";
//   }
//   else{
//     echo "ERROR DELETING RECORD" .$conn->error;
//   }
// }


// if(isset($_POST['deleteag'])){
//   $agendaID = $_POST['deleteID'];
//   $projectID = $_POST['projectID'];


//   $sql = "DELETE from agenda where agendaID=$agendaID";
//   $result=$conn->query($sql);
//   if ($conn->query($sql)){
//     echo "berjaya";
//    echo "<html><script> window.location.href=\"editproject.php?id=$projectID\";</script></html>";
//   }
//   else{
//     echo "ERROR DELETING RECORD" .$conn->error;
//   }
// }


// if(isset($_POST['deletein'])){
//   $incomeID = $_POST['deleteID'];
//   $projectID = $_POST['projectID'];


//   $sql = "DELETE from income where incomeID=$incomeID";
//   $result=$conn->query($sql);
//   if ($conn->query($sql)){
//    echo "<html><script> window.location.href=\"editproject.php?id=$projectID\";</script></html>";
//   }
//   else{
//     echo "ERROR DELETING RECORD" .$conn->error;
//   }
// }


// if(isset($_POST['deleteex'])){
//   $incomeID = $_POST['deleteID'];
//   $projectID = $_POST['projectID'];


//   $sql = "DELETE from expenditure where incomeID=$incomeID";
//   $result=$conn->query($sql);
//   if ($conn->query($sql)){
//    echo "<html><script> window.location.href=\"editproject.php?id=$projectID\";</script></html>";
//   }
//   else{
//     echo "ERROR DELETING RECORD" .$conn->error;
//   }
// }
$conn->close();
?>