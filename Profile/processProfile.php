<?php
include 'dbconnect.php';

if(isset($_POST['update'])){
    $userID=$_POST['userID'];
    // echo "user id is $userID";
    // $target_dir = "uploads/";
    // $profileImage='';
    // if(isset($_FILES['fileToUpload'])){     
    //     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    //     $profileImage =  basename( $_FILES["fileToUpload"]["name"]);
    // }
    
    $email = $_POST['email'];
    // $hashedpassword = sha1($_POST['password']);
    $chname = $_POST['charityName'];
    $adname = $_POST['adminName'];
    $country = $_POST['country'];
    
    $sql = "UPDATE profile SET email='$email',chname='$chname',adname='$adname',country='$country' WHERE userID=$userID";
    if (mysqli_query($conn, $sql)) {
        // session_start();

        echo "<html><script> window.location.href=\"profile.php\";</script></html>";
             
        // echo "<a href='../Profile/profile.php'></a>";
        // $_SESSION['message'] = 'Profile updated successfully';
    }
}


// if(isset($_POST['delete'])){

//     $sql = "DELETE * FROM profile where userID=$profileID";
//     if($conn->query($sql5)){
//         // echo "all delete";
//     }
//     else{
//       echo "Error deleting record: " . $conn->error;
//     }
//     echo "<a href='../IndexLoginSignup/index.html'</a>";
//   // }
// $conn->close();
// }



    





?>