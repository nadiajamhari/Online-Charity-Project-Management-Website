<?php
include_once("pconfig.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="stylesheet" type="text/css" href="viewProject.css">
    <title>Project of Charity</title>
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
                <a href="project.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
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
                <?php
                
                $sql = "SELECT * FROM project where projectID=" . $_GET["id"] . "";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4"><?php echo $row["projectName"]; ?></h3>
                        <div class="card-body">
                            <div>
                                <table>

                                <thead>
                                    <th id="issue"></th>
                                    <th></th>
                                    <th id="details"></th>
                                </thead>


                                    <tbody>
                                    <tr>
                                        <td>Project Name</td>
                                        <td>:</td>
                                        <td><?php echo $row['projectName']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>
                                        <td>:</td>
                                        <td><?php echo $row['startDate']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>End Date</td>
                                        <td>:</td>
                                        <td><?php echo $row['endDate']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Participant Level</td>
                                        <td>:</td>
                                        <td><?php echo $row['participantLevel']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Venue</td>
                                        <td>:</td>
                                        <td><?php echo $row['venue']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>:</td>
                                        <td><?php echo $row['country'];
                                        }
                                    } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Objective</td>
                                        <td>:</td>
                                        <td><?php
                                            $count = 1;
                                            $sql = "SELECT * FROM objective where projectID=" . $_GET["id"] . "";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo $count . ". " . $row['objective'] . "<br>";
                                                    $count++;
                                                }
                                            } else {
                                                echo "Not Available";
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>List of Committee</td>
                                        <td>:</td>
                                        <td><?php
                                            $sql = "SELECT * FROM list_committee where projectID=" . $_GET["id"] . "";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo "<table>
                                            <tr><td>Name</td><td>Position</td>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row['name'] . "<td>:  ".$row['position'] . "</td><tr><br>";
                                                }
                                                echo "</table></td>";
                                            } else {
                                                echo "Not Available</td>";
                                            } ?>
                                    </tr>
                                    <tr>
                                        <td>Activity Agenda</td>
                                        <td>:</td>
                                        <td><?php

                                            $sql = "SELECT * FROM agenda where projectID=" . $_GET["id"] . " ORDER BY dateevent";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "<table>
                                            <tr><td>Date</td><td>Time</td><td>Activity</td>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row['dateevent'] . "</td><td>" . $row['timeevent'] . "</td><td>" . $row['activity'] . "</td><tr>";
                                                }
                                                echo "</table></td>";
                                            } else {
                                                echo "Not Available</td>";
                                            } ?>
                                    </tr>
                                    <tr>
                                        <td>Income</td>
                                        <td>:</td>
                                        <td><?php

                                            $sql = "SELECT * FROM income where projectID=" . $_GET["id"] . "";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "<table>
                                            <tr><td>item</td><td>Amount (RM)</td>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row['item'] . "</td><td>" . $row['amount'] . "</td><tr>";
                                                }
                                                echo "</td>
                                                <tr>
                                                </tr></table>
                                                ";
                                            } else {
                                                echo "Not Available </td>";
                                            } ?>
                                    </tr>
                                    <tr>
                                        <td>Expenditure</td>
                                        <td>:</td>
                                        <td><?php

                                            $sql = "SELECT * FROM expenditure where projectID=" . $_GET["id"] . "";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "<table>
                                            <tr><td>item</td><td>Amount (RM)</td>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr><td>" . $row['item'] . "</td><td>" . $row['amount'] . "</td><tr>";
                                                }
                                                echo "</table></td>";
                                            } else {
                                                echo "Not Available</td>";
                                            } ?>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                <?php $id=$_GET['id'];
                                echo "<a href='editProject.php?id=$id'>
                                    <button type='submit' class='btn btn-info'>Edit
                                    </button></a>&nbsp; <a href='project.php'>
                                    <button type='submit' class='btn btn-info'> Back
                                    </button></a></div>";?>
                        </div>
            </div>

            <!--End Table-->



            
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="layout.js"></script>
    <script type="text/javascript" src="project.js"></script>
</body>

</html>
<?php
$conn->close();

?>