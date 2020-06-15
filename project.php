<?php include_once("pconfig.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="layout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="project.css">
</head>

<body>
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div class="msidenav">
            <li id="nav-item">
                <a href="profile.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span>MY PROFILE</span></a>
            </li>
            <li id="nav-item">
                <a href="project.html"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    <span>PROJECTS</span></a>
            </li>
            <li id="nav-item">
                <a href="volunteer.html"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    <span>VOLUNTEERS</span></a>
            </li>

        </div>

        <div class="fsidenav">
            <li id="nav-item">

                <a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <span>SETTINGS</span></a>

            </li>
        </div>

    </div>

    <div id="main">

        <header>
            <div class="topnav">
                <li id="nav-item"><a style="cursor:pointer" onclick="openNav()">&#9776;</a></li>


                <a href="index.html"><img id="logo" src="logo.png" height="70px" class="d-inline-block align-top" alt="logo"></a>
                <div class="topnav-right">
                    <li id="nav-item"><a href="#">Logout</a></li>
                </div>
            </div>

        </header>

        <main class="container">

            <h2>Charity Name</h2>

            <!--Table Sebenar-->

            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">LIST OF PROJECTS</h3>
                <div class="card-body">
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
                                <!--retrieve data from data base-->

                                <?php
                                $sql = "SELECT * FROM project";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {?>
                                        <tr><td><?php echo $row["projectName"];?></td>
                                        <td><?php echo $row["participantLevel"];?></td>
                                        <td><?php echo $row["startDate"]?></td>
                                        <td><?php echo $row["endDate"]?></td>
                                        <td><li><a href="MeetingList.html">View meeting</a></li>
                                            <li><a href="assignProject.html">View volunteer</a></li></td>
                                        <td>
                                             <button class="btn-default a-btn-slide-text"><a href="viewproject.php?id=<?php $row["projectID"];?>"></a><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                       </button></a>&nbsp;
                                        <button type="button" class="btn-danger a-btn-slide-text" data-toggle="modal"
                                            data-target="#ModalCenter">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button> </td></tr>
                                    <?php
                                    }
                                }
                               
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                        <a href="addNewProject.php">
                            <button type="submit" class="btn btn-info">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <span>Add New Project</span>
                            </button></a></div>
                </div>
            </div>

            <!--End Table-->



            <!-- Modal HTML -->

            <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this project? This process cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <footer>
           
                MyCharity<br>

                © 2020 FCSIT. All Rights Reserved
           
        </footer>
    </div>


<?php
 $conn->close();

?>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="layout.js"></script>
</body>

</html>