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

$sql2 = "SELECT * FROM files WHERE meetingID=$meetingid";
$result2 = mysqli_query($conn, $sql2);
                           
$file = mysqli_fetch_assoc($result2);

$filename = $file['name'];

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
    <title>Update Meeting</title>
</head>

<body>
   
    <div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        
            <li id="nav-item">
                <a href="../Profile/profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span>MY PROFILE</span></a>
            </li>
            <li id="nav-item">
                <a href="./ManageProject/project.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
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
                    class="card-header text-center font-weight-bold text-uppercase py-4">UPDATE MEETING DETAILS</h3>
                <div class="card-body">
                    <form method="post" action="updatemeetingprocess.php?id=<?php echo $meetingid ?>" enctype="multipart/form-data">
                        <p class="alert alert-info">Required information is marked with an asterisk (*)</p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="meetingName" >*MEETING NAME</label>
                                <input type="text" class="form-control" id="meetingName" name="mname" value="<?php echo $mname; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">*DATE</label>
                                <input type="date" class="form-control" id="meetingDate" name="mdate" value="<?php echo $mdate; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="start" >*START TIME</label>
                                <input type="time" class="form-control" id="start" name="start" value="<?php echo $start; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end" >*END TIME</label>
                                <input type="time" class="form-control" id="end" name="end" value="<?php echo $end; ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="Venue" >*VENUE</label>
                                <input type="text" class="form-control" id="meetingVenue" name="venue" value="<?php echo $venue; ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="desc" >MEETING DESCRIPTION</label>
                                <textarea class="form-control" id="desc" name="description"  rows="3" cols="20"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group col-md-12" >
                                <label for="participant" >EDIT PARTICIPANT</label>
                                <table class="table table-borderless " id="dynamic_field">
                                    <?php
                                    $n=1;
                                    foreach($pname as $Value){
                                    echo "<tr id='row$n'><td><input type='text' name='pname[]' value='$Value->pname' class='form-control name_list' /></td>
                                        <td><button type='button' name='remove' id='$n' class='btn btn-danger btn_remove'>X</button></td></tr>";
                                    $n++;
                                    }
                                    ?>                
                                </table>
                                <span class="pull-right"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></span>
                            </div>
                                    
                        </div>
                                <!-- Button (Double) -->
                        <div class="form-group col-md-12">
                                        <a href="viewmeeting.php?id=<?php echo $meetingid; ?>" id="cancel" name="cancel" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" class="btn btn-info" name="save" value="Save">
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
    
    var i=<?php echo $n ?> - 1;

	
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="pname[]" placeholder="Enter Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){

		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	
});
</script>
