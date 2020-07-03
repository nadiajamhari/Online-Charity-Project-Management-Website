<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

include_once("config.php");

//getting id from url
$meetingid = $_GET['id'];

$sql = "SELECT * FROM meeting WHERE meetingID=$meetingid";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $mname = $row['mname'];
    $mdate = $row['mdate'];
    $start = $row['start'];
    $end = $row['end'];
    $venue = $row['venue'];
    $description = $row['description'];
}

$sql1 = "SELECT pname FROM plist WHERE meetingID=$meetingid";
$result1 = $conn->query($sql1);

$pname = array();

while($row = $result1->fetch_object()){
    $pname[] = $row;
}

$sql2 = "SELECT projectID FROM meeting WHERE meetingID=$meetingid";
$result2 = $conn->query($sql2);

while ($row = $result2->fetch_assoc()) {
    $projectID = $row['projectID'];
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
    <title>Meeting Information</title>
</head>

<body>
    
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        
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
                    class="card-header text-center font-weight-bold text-uppercase py-4">MEETING INFORMATION</h3>
                <div class="card-body">
                    <table  class="table table-bordered table-responsive-md table-striped text-center">
                        <tr style="text-align: left;">
                            <th style="width: 30%;">NAME</th>
                            <td><?php echo $mname;?></td>
                        </tr>
                        <tr style="text-align: left;">
                            <th>DATE</th>
                            <td>
                            <?php 
                            echo date('d/m/Y',strtotime($mdate));
                            ?>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <th>TIME</th>
                            <td>
                            <?php 
                            echo "From ".date('h:i a',strtotime($start))." to ".date('h:i a',strtotime($end));
                            ?> 
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <th>VENUE</th>
                            <td><?php echo $venue;?></td>
                        </tr>
                        <tr style="text-align: left;">
                            <th>DESCRIPTION</th>
                            <td><?php echo $description;?></td>
                        </tr>  
                        <tr style="text-align: left;">
                            <th>PARTICIPANT LIST</th>
                            <td>
                            <?php 

                            $n=1;
                            foreach($pname as $Value){
                                if(empty($Value->pname)){
                                    echo "Unavailable";
                                }
                                else{
                                echo $n.".";
                                echo $Value->pname;
                                echo "<br>";
                                $n++;
                                }
                            }
                            ?>
                            </td>
                        </tr> 
                        
                    </table>
                    <form method="POST" action="updatemeeting.php?id=<?php echo $meetingid; ?>">
                        <div class='pull-right'>
                        
                            <input class="btn btn-default" type="submit" name="update" value="Update Details">
		                </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <table  class="table table-bordered table-responsive-md table-striped text-center">
                        <tr style="text-align: left;">
                            <th style='width: 30%'>MEETING FILE</th>
                            <td>
                            <?php

                            $sql4 = "SELECT * FROM files WHERE meetingID=$meetingid";
                            $result = mysqli_query($conn, $sql4);
                            if($result->num_rows>0){
                                $file = mysqli_fetch_assoc($result);
                                $filepath = 'uploads/' . $file['name'];
                                echo $file['name'];
                                echo "<br>";
                                echo "<a href='filedownload.php?file_id= $meetingid'>Download</a>";
                               
                            }

                            else{
                                echo "Unavailable";
                            }
                            ?>
                            </td>
                        </tr> 
                    </table>
                    <form method="POST" action="updatefile.php?id=<?php echo $meetingid; ?>">
                        <div class='pull-right'>
                            <input class="btn btn-default" type="submit" name="update" value="Update File">
		                </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <div>
                        <a href="meetinglist.php?id=<?php echo $projectID; ?>" id="cancel" name="cancel" class="btn btn-secondary">Back</a>
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

</body>

</html>
