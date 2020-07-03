<?php include 'configAP.php';
  session_start();
  $userID=$_SESSION['userID'];
  $_SESSION['login'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="icon" href="Favicon.png">
    
    <title>Select Volunteer</title>
    
</head>

<body>  
        
        <!-- SIDENAV BARU SBB TAMBAH SETTING -->
        <div id="mySidenav" class="sidenav">

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div class="msidenav">
            <li id="nav-item">
                <a href="../Profile/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
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
                    <span>COMMITTEE</span></a>
            </li>

        </div>

        </div>
         <!-- END OF SIDE NAV BARU -->
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

            <?php include 'configAP.php'; ?>
            <main class="container">
                <h2 style="font-size: 45px;"><br>
                    <!--- fetch project name from database --->
                    <?php 
                        $proID = $_GET["pro"];
                        $querypronm="SELECT projectName FROM `project` WHERE projectID=".$proID;
                        $projname = mysqli_fetch_array(mysqli_query($mysqli,$querypronm));
                        echo $projname[0];?><br><br>
                </h2>
                <p style="font-size:17px" class="alert alert-info">Please <b>tick</b> the volunteer(s) you want to add to your project from the list of VOLUNTEER(S) AVAILABLE.</p>
                <!--table-->
                <?php include 'selectVolunteerTable.php'; ?>

                <!--confirm button-->
                <span class="table-confirm"><button type="button" style="font-size:15px"
                    class="btn btn-success float-right btn-rounded btn-sm my-0" data-toggle="modal" data-target="#ModalConfirm">Confirm</button></span><br>

                <!-- Modal Confirm-->
                <div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size:17px">
                                Confirm to add selected volunteer(s)?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" form="confirmform" class="btn btn-success">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal (POP UP DELETE)-->
                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLongTitle">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete <b>[volunteer name]</b>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal (POP UP VIEW VOLUNTEER PROFILE)-->
            <div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLongTitle">Volunteer Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="volunteer_detail">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
                
            ?>
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

    <!-- boleh ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="ssselectVolunteer.js"></script>
</body>

</html>