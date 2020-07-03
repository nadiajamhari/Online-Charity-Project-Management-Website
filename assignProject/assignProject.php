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
    
    <title>Project Volunteer</title>
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


                <a href="index.html"><img id="logo" src="logo.png" height="70px" class="d-inline-block align-top" alt="logo"></a>
                <div class="topnav-right">
                    <li id="nav-item"><a href="../IndexLoginSignup/logout.php">Logout</a></li>
                </div>
            </div>

        </header>

        

        <main class="container">
            <h2 style="font-size: 45px;"><br>
                    <!--- fetch project name from database --->
                    <?php 
                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                        if (isset($_GET["id"])){
                        $proid=$_GET["id"];
                        echo '<script>console.log("'.$proid.'");</script>';
                        $projname = mysqli_fetch_array(mysqli_query($mysqli,"SELECT projectName FROM `project` WHERE projectID=".$proid));
                        echo $projname[0];}}?><br><br></h2>
                <!-- table -->
                <div class="card">
                    <h3 style="background-color:rgb(255, 139, 112); color: white;" class="card-header text-center font-weight-bold text-uppercase py-4">VOLUNTEER(S) ASSIGNED</h3>
                    <div class="card-body">
                    <div class="table">
                        <span class="table-add float-right mb-3 mr-2"><a href="<?php echo 'selectVolunteer.php?pro='.$proid.'&user='.$userID;?>" class="button"><i class="btn btn-info" aria-hidden="true"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span>Volunteer</span></i></a></span>

                        <table id="table1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Volunteer Name</th>
                            <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- generate list volunteers assigned -->
                            <?php
                                $query_assigned='SELECT volunteer_project.idnumber, volunteer.name, volunteer_project.projectID 
                                FROM volunteer 
                                INNER JOIN volunteer_project 
                                ON volunteer_project.idnumber=volunteer.idnumber
                                WHERE volunteer_project.projectID='.$proid.'
                                ORDER BY 
                                idnumber';
                                $i=1;
                                $result = mysqli_query($mysqli,$query_assigned);
                                while($row = mysqli_fetch_array($result)){
                                echo '<tr>';
                                echo '<td class="pt-3-half">' . $row['idnumber'] . '</td>';
                                echo '<td class="pt-3-half">' . $row['name'] . '</td>';
                                echo '<td class="text-center"><span class="table-remove"><button class="btn-danger btn-rounded btn-sm my-0" data-projid='.$proid.' data-name="' .$row['name']. '" 
                                data-numb='.$row['idnumber'].'><i class="fa fa-trash"></i></button></span></td>';
                                echo '</tr>';
                                $i++;
                                }
                            ?>
                        
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            <!-- table -->
            
            <!-- Modal (POP UP DELETE)-->
            <div class="modal fade in" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLongTitle">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="message">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <p  id="myform"> 
                                <button type="button" onclick="document.location=''" id="deleteConfirm" class="btn btn-danger">Remove</button> 
                            </p>
                            
                                
                        </div>
                    </div>
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
        <script type="text/javascript" src="assignProjecttt.js"></script>
</body>

</html>