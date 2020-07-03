<?php
include_once('config.php');
session_start();

$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

//take project name
$projectID = $_GET['id'];

$sql="SELECT * FROM project WHERE projectID = $projectID";
$result = $conn->query($sql);
if($result->num_rows>0){
while ($row = $result->fetch_assoc()) {
    $projectName = $row['projectName']; 

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
    
    

    <link rel="icon" href="Favicon.png">
    <title>Meeting List</title>
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
                <!-- <li id="nav-item"><a style="cursor:pointer" onclick="openNav()">&#9776;</a></li> -->
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
            
            <h2 style="font-size: 45px;"><br><?php echo $projectName; ?><br><br></h2>
            <!-- CARD -->
            <div class="card">
                <h3 style="background-color:rgb(255, 139, 112); color: white;"
                    class="card-header text-center font-weight-bold text-uppercase py-4">MEETING LIST</h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <!-- BUTTON ADD MEETING -->
                        <span class="pull-right">
                            <div class="form-group col-md-6">
                            <?php echo "<a href='meetingform.php?id=$projectID'>
                                    <button type='button' class='btn btn-info'>
                                        <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                                        <span>Add New Meeting</span>
                                    </button>
                                </a>";?>
                                </a>
                            </div>
                        </span>
                        
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Meeting Name</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                $sql = "SELECT * FROM meeting WHERE projectID=$projectID ORDER BY mdate";
                                $result = $conn->query($sql);
                                if ( $result ->num_rows >0 ) {
                                    while($rows = $result -> fetch_assoc()){
                                        $id = $rows['meetingID'];
                                        // echo "<tr><td>".$rows['mdate']."</td>";
                                        echo "<tr><td>";
                                        $date=$rows['mdate'];
                                        echo date('d/m/Y',strtotime($date));
                                        echo "</td>";
                                        echo "<td>".$rows['mname']."</td>";
                                        echo "<td><span class=\"table-remove\"><a href=\"viewmeeting.php?id=$id\"><button class=\"btn-default btn-rounded btn-sm my-0\">
                                                <i class=\"glyphicon glyphicon-folder-open\"></i></button></a></span></td>";
                                        echo "<td><button type = 'button' class='btn-danger a-btn-slide-text' data-deleteid=".$id.">
                                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td></tr>";
                                    }
                                    
                                } 
                                else{
                                    
                                }
                                $conn->close();

                            ?>
                            </tbody>
                            
                        </table>
                        
                    </div>
  
                </div>
            </div>

            <!-- Modal (POP UP DELETE)-->
            <div class="modal fade in" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
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
                            Are you sure you want to delete this meeting? This process cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <p id="delete_id"></p>
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

</body>

</html>
<script>
$(document).ready(function(){

    $('.btn-danger.a-btn-slide-text').on('click',function(){
        rec=$(this).data("deleteid");
        console.log(rec);

        $('#modalDelete').modal();
        
        input="<a href='deletemeeting.php?id="+rec+"' class='btn btn-danger'>Delete</a>";
        document.getElementById('delete_id').innerHTML=input;
    })
})
</script>