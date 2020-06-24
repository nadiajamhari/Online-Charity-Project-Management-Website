<?php
include_once('pconfig.php');
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$name=$age=$noPhone=$email=$address=$zip=$state=$occupation="";

if(isset($_POST['add'])){
$name = $_POST['name'];
$age = $_POST['age'];
$noPhone = $_POST['noPhone'];
$email = $_POST['email'];
$address = $_POST['address'];
$occupation = $_POST['occupation'];

$sql = "INSERT into committee (userID,name,age,noPhone,email,address,occupation)
VALUES ('$userID','$name','$age','$noPhone','$email','$address','$occupation')";

if($conn->query($sql)===TRUE){
    echo "<html><script> window.location.href=\"committee.php\";</script></html>";
}
else{
    echo "error" .$sql. "<br>" . $conn->error;
}


}

if(isset($_POST['update'])){
    $committeeID = $_POST['committeeID'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $noPhone = $_POST['noPhone'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];

   

    


    
    $sql = "UPDATE committee SET name='$name', age='$age' ,noPhone='$noPhone' ,
    email='$email',address='$address', occupation='$occupation' 
    where committeeID=$committeeID";
    
    if (mysqli_query($conn, $sql)) {
        echo "<html><script> window.location.href=\"viewCommittee.php?id=$committeeID\";</script></html>";
         } else {
           echo "Error updating record: " . mysqli_error($conn);
         }
        
    
    }


$conn->close();
// committee.php?id=$userID
?>