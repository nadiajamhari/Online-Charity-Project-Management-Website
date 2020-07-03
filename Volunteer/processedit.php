

<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;
include_once('config.php');

if(isset($_POST['update'])){
$id=$_POST['id'];
$name= $_POST['name'];
$age=$_POST['age'];
$occupation=$_POST['occupation'];
$phonenum=$_POST['phonenum'];
$email=$_POST['email'];
$address=$_POST['address'];
$role=$_POST['preferredRole'];


$sql = "UPDATE volunteer SET name='$name', age='$age', occupation='$occupation', phonenum='$phonenum',
       email='$email', address='$address', preferredRole='$role' WHERE idnumber='$id'";
$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo "<html><script> window.location.href=\"viewVolunteer.php\";</script></html>";

}
else{
  echo "Error updating record: ". $conn->error;
}

}
?>

