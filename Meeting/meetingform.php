<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;


include_once("config.php");

$projectID = $_GET['id'];

$sql="SELECT * FROM project WHERE projectID = $projectID";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $projectName = $row['projectName'];
    
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
    <link rel="icon" href="Favicon.png">
    <title>Meeting Form</title>
</head>

<body>

    
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <li id="nav-item">
                <a href="..Profile/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
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
            <h2 style="font-size: 45px;"><br>Project Name<br><br></h2>
            <!-- table -->
            <div class="card">
                <h3 style="background-color:rgb(255, 139, 112); color: white;"
                    class="card-header text-center font-weight-bold text-uppercase py-4">MEETING FORM</h3>
                <div class="card-body">
                    <form method="post" action="addmeetingprocess.php" enctype="multipart/form-data">
                        <input type="hidden" name="projectID" value="<?php echo $projectID;?>">
                        <p class="alert alert-info">Please fill in this form to add new meeting information. Required information is marked with an asterisk (*)</p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="meetingName" >*MEETING NAME</label>
                                <input type="text" class="form-control" id="meetingName" name="mname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">*DATE</label>
                                <input type="date" class="form-control" id="meetingDate" name="mdate" required> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="start" >*START TIME</label>
                                <input type="time" class="form-control" id="start" name="start" required>   
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end" >*END TIME</label>
                                <input type="time" class="form-control" id="end" name="end" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Venue" >*VENUE</label>
                                <input type="text" class="form-control" id="meetingVenue" name="venue" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="meetingFile" >MEETING FILE</label>
                                <p>Please upload meeting related file as evidence</p>
                                <input type="file" name="file" id="file" class="form-control-file">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="desc" >MEETING DESCRIPTION</label>
                                <textarea class="form-control" id="desc" name="description" rows="3" cols="20" placeholder="Please write a short description about the meeting"></textarea>
                            </div>
                            <div class="form-group col-md-12" >
                                <label for="participant" >PARTICIPANT</label>
                                <table class="table" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="pname[]" placeholder="Enter Name" class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Button (Double) -->
                        <div class="form-group col-md-12" >
                            <a href="meetinglist.php?id=<?php echo $projectID; ?>" id="cancel" name="cancel" class="btn btn-secondary">Back</a>
                            <input type="submit" class="btn btn-info" name="submit" value="Submit">       
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
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="pname[]" placeholder="Enter name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});	
});
</script>