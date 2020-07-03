<?php
include 'dbconnect.php';
session_start();
$userID=$_SESSION['userID'];

$sql = "SELECT * FROM profile where userID=$userID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
      $image = $row['profileImage'];
      $chname = $row['chname'];
      $admin = $row['adname'];
      $country = $row['country'];
      $email = $row['email'];
      }
    }


?>

<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
  <!---Original layout-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <!---New Added--->
    
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!---Sweet-Alert css-->
        <link href="assets/css/sweet-alert/sweetalert.css" rel="stylesheet">
        <link rel="icon" href="Favicon.png">
     <title>Privacy Profile</title>

</head>


<!-- Side Navi -->
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
            <a href="../Volunteer/volunteer.php"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <span>VOLUNTEERS</span></a>
        </li>
        <li id="nav-item">
            <a href="../Committee/committee.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                <span>COMMITTEE</span></a>
        </li>


    </div>

    <div id="main">

        <header>
            <div class="topnav">
            <li id="nav-item"><a style="cursor:pointer" onclick="openNav()">
                <span class="glyphicon glyphicon-menu-hamburger">
                </li>
                

                <a href="#"><img id="logo" src="logo.png" height="70px" class="d-inline-block align-top"
                        alt="logo"></a>
                <div class="topnav-right">
                    <li id="nav-item"><a href="../IndexLoginSignup/logout.php">Logout</a></li>
                </div>
            </div>

        </header>


       <!-- Back button -->
                       <div class="nav-detail">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="profile.php" >Back</a>
                              </li>
                              <!-- <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mission</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Us</a>
                              </li> -->
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row no-margin home-det">
                                      <div class="col-md-4 big-img">

  <!--Front Image & Delete Button -->                   
                                          
                                         <img src="uploads/<?php echo $image; ?>" alt="">
                                         </div>
  <!-- Edit Information-->
                                          <div class="col-md-8 home-dat">
                                          <div class="detal-jumbo">
                                            <h1>Privacy Charity</h1>
                                            
                                         <div class="jumbo-address">
                                         <div class="row no-margin">
                                            <form action="proccessprivacyProfile.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="userID" value="<?php echo $userID;?>";>

                                            <div class="form-group col-md-8"> 
                                                <label>Old Password</label>
                                                <input class="form-control"  placeholder="Old Password"  id="password" name="oldpassword" type="password" required>
                                               
                                                </div>	
                                               <div class="form-group col-md-8"> 
                                                <label>New Password</label>
                                                 
                                                <input class="form-control"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password" name="newpassword" type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                </div>	

                                                <div class="form-group col-md-8"> 
                                                <label>Re-type Password</label>
                                                <input class="form-control"  placeholder="Re-type Password"  id="password" name="repassword" type="password" required>
                                               
                                                </div>

                                                

                                                <div class="form-group col-md-8">

                                                <div class="pull-right">
                                                <button type="submit" name="save" class="btn btn-info">Save</button> 
                                                </div>
                                                </div>
                                                




   
                                        </form>
                                        <div class="form-group col-md-8">

                                                <a style="color:blue;" class='a-btn-slide-text' type="button" data-deleteid="<?php echo $userID?>">Delete Account</a>
                                                
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
                                                    Are you sure you want to delete this account? This process cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <a id="delete_id"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

    <!-- <script type="text/javascript" src="updateprofile.js"></script> -->


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



          <!-- JavaScript -->

        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>        
        

        <script src="assets/js/sweet-alert/sweetalert.min.js"></script>
        <script src="assets/js/sweet-alert/jquery.sweet-alert.js"></script>

        <script src="assets/js/script.js"></script>

  

</body>
</html>
<script>
$(document).ready(function(){

    $('.a-btn-slide-text').on('click',function(){
        rec=$(this).data("deleteid");
        console.log(rec);

        $('#modalDelete').modal();
        
        input="<a href='deleteaccount.php?id="+rec+"' class='btn btn-danger'>Delete</a>";
        document.getElementById('delete_id').innerHTML=input;
    })
})
</script>