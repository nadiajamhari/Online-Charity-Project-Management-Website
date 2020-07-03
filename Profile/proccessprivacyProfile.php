<?php

include_once ("dbconnect.php");

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$repassword = $_POST['repassword'];
$userID=$_POST['userID'];

$passwordaresame_error="";
function checkPassword($pwd1, $pwd2) {
	if ($pwd1 === $pwd2){
		return true;
	}else{
		$passwordaresame_error="The password typed did not match";
		return false;
	}
}
$hashpassword = sha1($oldpassword);

$sql= "SELECT password from profile where userID =$userID";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $password=$row['password'];
    }
}
$samePassword = checkPassword($hashpassword, $password);

if($samePassword){
    $samePassword1 = checkPassword($newpassword, $repassword);

    if($samePassword1){
        $newhashedpassword=sha1($newpassword);
        $sql="UPDATE profile set password='$newhashedpassword' where userID=$userID";
        if (mysqli_query($conn, $sql)) {

            $message = "Password Update!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<html><script> window.location.href=\"profile.php\";</script></html>";
                 
        }
    }

        else{
            $message = "New Password Not Match!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<html><script> window.location.href=\"privacyProfile.php?id=$userID\";</script></html>";
        }
       

}

else{
    $message = "Old Password Not Match!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<html><script> window.location.href=\"privacyProfile.php?id=$userID\";</script></html>";
}

?>