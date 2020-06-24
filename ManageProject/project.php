<?php include_once("pconfig.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$sql="SELECT chname from profile where userID=$userID";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $charityName=$row['chname'];
    }

}


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
    <link rel="stylesheet" type="text/css" href="project.css">
    <link rel="icon" href="Favicon.png">
    <title>Project of Charity</title>
</head>

<body>
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

            <h2><?php echo $charityName;?></h2>

            <!--Table Sebenar-->

            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">LIST OF PROJECTS</h3>
                <div class="card-body">
                <div class="pull-right">
                        <a href="addNewProject.php">
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <span>Add New Project</span>
                            </button></a></div>
                    <div class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th id="part-meet">Participant Level</th>
                                    <th id="date">Start Date</th>
                                    <th id="date">Finish Date</th>
                                    <th id="part-meet">View</th>
                                    <th id="action">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                                $sql = "SELECT * FROM project where userID=$userID Order by startDate DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['projectID'];
                                        $startDate = $row['startDate'];
                                         $endDate = $row['endDate'];
                                        echo "<tr><td>". $row["projectName"]." </td>";
                                        echo "<td>". $row["participantLevel"]."</td>";
                                        echo "<td>".date('d/m/Y',strtotime($startDate))."</td>";
                                        echo "<td>".date('d/m/Y',strtotime($endDate))."</td>";
                                        echo "<td><li><a href='../meeting/meetinglist.php?id=$id'>View meeting</a></li>
                                            <li><a href='../assignProject/assignProject.php?id=$id'>View volunteer</a></li></td>";
                                        echo "<td><a href='viewProject.php?id=$id' alt='view'><button class='btn-default a-btn-slide-text'><span class='glyphicon glyphicon-folder-open'
                                        aria-hidden='true'></span>
                                        </button></a>&nbsp;
                                        <button type='button' class='btn-danger a-btn-slide-text' 
                                        data-deleteid=".$id."><span class='glyphicon glyphicon-trash' 
                                        aria-hidden='true'></span>
                                        </button> </td></tr>";
                        
                                    }
                                }
                               
                                ?>
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>

            <!--End Table-->



            <!-- Modal HTML -->

  
            <div class="modal fade in" id="modalDelete" tabindex="-1" role="dialog"
                aria-labelledby="ModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLongTitle">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            
                            Are you sure you want to delete this project? This process cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <p id="iddelete"></p>
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
    <script type="text/javascript" src="layout.js"></script>
    <script type="text/javascript" src="project.js"></script>
</body>

</html>
<?php
 $conn->close();

?>