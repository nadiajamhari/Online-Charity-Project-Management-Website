<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

include_once("config.php");

$meetingid = $_GET['id'];

$sql = "SELECT * FROM meeting WHERE meetingID=$meetingid";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $mname = $row['mname'];
    
}


// $sql2 = "SELECT * FROM files WHERE meetingID=$meetingid";
// $result2 = mysqli_query($conn, $sql2);
                           
// $file = mysqli_fetch_assoc($result2);

// $filename = $file['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="icon" href="Favicon.png">
    <title>Update File</title>
</head>

<body>
   
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        
            <li id="nav-item">
                <a href="./Profile/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span>MY PROFILE</span></a>
            </li>
            <li id="nav-item">
                <a href="../ManageProject/project.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    <span>PROJECTS</span></a>
            </li>
            <li id="nav-item">
                <a href="../Volunteer/viewvolunteer.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    <span>VOLUNTEERS</span></a>
            </li>
            <li id="nav-item">
                <a href="../Committee/committee.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    <span>COMMITEE</span></a>
            </li>

    </div>
     

    <div id="main">

        <header>
            <div class="topnav">
                <li id="nav-item"><a style="cursor:pointer" onclick="openNav()">
                <span class="glyphicon glyphicon-menu-hamburger">
                </li>

                <a href="#"><img id="logo" src="logo.png" height="70px" class="d-inline-block align-top" alt="logo"></a>
                <div class="topnav-right">
                    <li id="nav-item"><a href="../IndexLoginSignup/logout.php">Logout</a></li>
                </div>
            </div>

        </header>


        <main class="container">
            <h2 style="font-size: 45px;"><br><?php echo $mname; ?><br><br></h2>
            <!-- table -->
            <div class="card">
                <h3 style="background-color:rgb(255, 139, 112); color: white;"
                    class="card-header text-center font-weight-bold text-uppercase py-4">UPDATE MEETING FILE</h3>
                <div class="card-body">
                    <form method="post" action="updatefileprocess.php?id=<?php echo $meetingid ?>" enctype="multipart/form-data">
                        <p class="alert alert-info">Please upload meeting related file.</p>
                        <div class="card" style="width: 35rem; margin: 0 auto;">
                            <div class="card-body">
                                <div class="form-group col-md-12 ">
                                    <label for="meetingFile" >CURRENT MEETING FILE</label>
                                    <table  class="table table-bordered table-responsive-md table-striped text-center">
                                        <tr style="text-align: left;">
                                            <td style='width: 25%'>FILE NAME</td>
                                            <td>
                                            <?php

                                            $sql4 = "SELECT * FROM files WHERE meetingID=$meetingid";
                                            $result = mysqli_query($conn, $sql4);

                                            if($result->num_rows>0){
                                                $file = mysqli_fetch_assoc($result);

                                            $filepath = 'uploads/' . $file['name'];
                                            echo $file['name'];  


                                            }
                                            else{
                                                echo "Unavailable"; 
                                            }
                        
                                            ?>
                                            </td>
                                        </tr> 
                                    </table>    
                                </div>
                                <div class="form-group col-md-12">
                                <?php 
if($result->num_rows>0){
    echo "<input type='submit' class='btn btn-danger' name='delete' value='Delete'>";  
}
?>
    
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="meetingFile" >REPLACE MEETING FILE</label>
                                    <input type="file" name="file" id="file" class="form-control-file">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-info" name="save" value="Save">
                                </div>
    
                            </div>
                        </div>
                        <!-- Button (Double) -->
                        <br><br>
                        <div class="form-group col-md-12">
                            <a href="viewmeeting.php?id=<?php echo $meetingid; ?>" id="back" name="back" class="btn btn-secondary">Back</a>
                        </div>
                    </form> 
                </div>
            </div>
            
        </main>
        <footer>
            <div class="container text-center">
                MyCharity<br>

                © 2020 FCSIT. All Rights Reserved
            </div>
        </footer>
    </div>


    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="layout.js"></script>

</body>

</html>

