<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'configAP.php';

    $id = $_POST['vol'];
    $user=$_POST['user'];
    $pro=$_POST['pro'];

    if(empty($id)) 
  {
    echo("You didn't select any volunteer.");
  } 
  else 
  {
    //add to database
    $valid=false;

    foreach($id as $i){
        $queryadd="INSERT INTO `volunteer_project`(`userID`, `projectID`, `idnumber`) VALUES (".$user.",".$pro.",".$i.")";
        $result = mysqli_query($mysqli,$queryadd);
        if($result){
            $valid=true;
        }
        else{
            $message = "fail to add".$i;
            echo "<script type='text/javascript'>alert('$message');</script>";
            $valid=false;
        }
        if($valid=false){
            break;
        }
    }

    if($valid=true){
        $message = "Volunteers Assigned";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $URL="assignProject.php?id=".$pro;
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        
    }
                        
 }
}

?>