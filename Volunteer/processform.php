<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

include_once("config.php");



$name=$occupation=$email=$address=$role="";
$age=$phonenum="";

    // if(isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["occupation"])&& isset($_POST["phonenum"])&& isset($_POST["email"])&& isset($_POST["address"]) && isset($_POST["preferredrole"])){
        // if(isset($_POST['submit'])){
        
        $name= $_POST['name'];
        $age=$_POST['age'];
        $occupation=$_POST['occupation'];
        $phonenum=$_POST['phonenum'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $role=$_POST['preferredRole'];

        $sql= "INSERT INTO volunteer (userID, name, age, occupation, phonenum, email, address, preferredRole)
        VALUES ('$userID','$name','$age','$occupation','$phonenum','$email','$address','$role')";
         
        if($conn->query($sql)===TRUE){
            echo "<html><script> window.location.href=\"viewvolunteer.php\";</script></html>";
        }
        else {
            echo "Error : " . $sql . "<br>" .$conn->error;
        }
        

    $conn->close();

?>
