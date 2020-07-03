<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;
include_once("config.php");
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
    <link href="layout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="Favicon.png">
    <title>Volunteer List</title>
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

    <div id="main">
      <h2 class="text-center">Volunteer Information</h2> 
    <main class="container">
      <h2 style="font-size: 5px;"><br></h2>
      <!-- table -->
      <div class="card">
          <h3 style="background-color:rgb(255, 139, 112); color: white;" class="card-header text-center font-weight-bold">List Of Volunteers</h3>
              <div class="card-body">
              <span class="pull-right">
                        <div class="form-group col-md-6">
                            <a href="addform.php">
                                <button type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    <span>Add New Volunteer</span>
                                </button>
                            </a>
                        </div>
                    </span>
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                            <tr>
                                <th>Volunteer ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sql2="SELECT * FROM volunteer WHERE userID=$userID";
                            $result2=$conn->query($sql2);
                            if ($result2->num_rows > 0) {
                            	while($row = $result2->fetch_assoc()) {

                                    echo"<tr><td>".$row["idnumber"]."</td>";
                                    echo "<td>".$row["name"]."</td>";
                                    echo "<td>".$row["preferredRole"]."</td>";


                                    echo '<td><span><button class="btn-default btn-rounded btn-sm my-0" id='.$row['idnumber'].'
                                    ><i class="glyphicon glyphicon-folder-open"></i></button></span></td>';
                                    echo "<td><button type='button' class='btn-default a-btn-slide-text'><a href='editvolunteer2.php?id=".$row["idnumber"]."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></td>";
                                    echo "<td><button type='button' class='btn-danger btn-rounded btn-sm my-0' data-numb=".$row["idnumber"]."><span class='glyphicon glyphicon-trash'></span></button></td></tr>";
                                }
                            }

                            ?>
                            </tbody>                                
                        </table>
                    </div>
                </div>
        </div>

        <!-- MODAL HTML -->
<div class="modal fade in" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="ModalLongTitle">Confirm Delete</h4>
                </div>
                <form action="deletevolunteer.php" method="POST">

                <div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                    <!-- <p id="myform"></p> -->
                    <!-- <p> </p>  this for user id-->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" name="deletebtn" id="myform">Delete</button>

                </div>
                </form>
            </div>
        </div>
    </div>

      
                <!-- Modal (POP UP VIEW VOLUNTEER PROFILE)-->
                <div class="modal fade in" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLongTitle">Volunteer Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="viewfolder.php" method="POST">

                        <div class="modal-body" id="volunteer_detail">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            
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
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="viewfolder.js"></script>
    <script type="text/javascript" src="deletevolunteer.js"></script>

</body>

</html>