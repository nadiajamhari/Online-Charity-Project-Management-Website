<?php
include_once("config.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$sql2 = "SELECT projectID FROM meeting WHERE meetingID='" . $_GET["id"] . "'";
$result2 = $conn->query($sql2);

while ($row = $result2->fetch_assoc()) {
    $projectID = $row['projectID'];
}

$sql = "DELETE FROM meeting WHERE meetingID='" . $_GET["id"] . "'";

if( mysqli_query($conn, $sql)){
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql2 = "SELECT projectID FROM meeting WHERE meetingID='" . $_GET["id"] . "'";
$result2 = $conn->query($sql2);

while ($row = $result2->fetch_assoc()) {
    $projectID = $row['projectID'];
}
mysqli_close($conn);




echo "<html><script> window.location.href='meetinglist.php?id=$projectID';</script></html>";
?>

