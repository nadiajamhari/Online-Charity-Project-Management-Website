<?php

include_once("config.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$mname = $mdate = $start = $end = $venue = $description ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ( isset($_POST["mname"]) && isset($_POST["mdate"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["venue"]) && isset($_POST["description"])){
        $projectID = $_POST["projectID"];
        $mname = $_POST["mname"];
        $mdate = $_POST["mdate"];
        $start = $_POST["start"];
        $end= $_POST["end"];
        $venue = $_POST["venue"];
        $description = $_POST["description"];

        $sql = "INSERT into meeting (projectID,mname,mdate,start,end,venue,description) VALUES 
        ('$projectID','$mname','$mdate','$start','$end','$venue','$description')";

            if($conn->query($sql)===TRUE){
                 $last_id = $conn->insert_id;
            }
            else {
                echo "Error : " . $sql . "<br>" .$conn->error;
            }   
    }
    if(isset($_POST["pname"])){
        foreach ($_POST["pname"] as $pname){
            $n[]=$pname;
        }
    }
    $count = 0;
    while ($count<sizeof($n)){
        $sql1 = "INSERT INTO plist(meetingID,pname) VALUES ('$last_id','$n[$count]')";
        $count++;

        if($conn->query($sql1)===TRUE){
                  
        }
        else{
            echo "Error : ".$sql1. "<br>".$conn->error;
        } 
    }

    //file upload
    $uploads_dir = 'uploads/';
        
    $filename = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $destination = $uploads_dir . $filename; 
    if (is_uploaded_file($_FILES['file']['tmp_name'])){  
        $sql4 = "INSERT INTO files (meetingID,name, size, downloads) VALUES ('$last_id','$filename', $size, 0)";   
        if (mysqli_query($conn, $sql4)) {
            //echo "File uploaded successfully go into database";
        }
        else{
            //echo "failed go to database";
        }  
    //in case you want to move  the file in uploads directory
    move_uploaded_file($_FILES['file']['tmp_name'], $uploads_dir.$filename);
    //echo 'moved file to destination directory';
    }
    $conn->close();
    //echo "<html><script> window.location.href=\"meetinglist.php\";</script></html>";
}
echo "<html><script> window.location.href='meetinglist.php?id=$projectID';</script></html>";
?>