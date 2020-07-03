<?php
include_once('dbconnect.php');
session_start();
if (isset($_SESSION['login']) && $_SESSION['userID'] && $_SESSION['email'] ==true ){
$userid=$_SESSION['userID'];
$sql = "SELECT * FROM profile where userID=".$userid;
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
    <!-- <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css"> -->
    <link href="assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="Favicon.png"> 
    <title> Profile</title>

</head>


<!--Side Navi -->
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

<!-- Top Nav Menu -->
                       <div class="nav-detail">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                              </li>
                              <li class="nav-item">
                                <a href="updateProfile.php?id=<?php echo $userid; ?>">Update</a>
                              </li>
                              <li class="nav-item">
                                <a href="privacyProfile.php?id=<?php echo $userid; ?>">Privacy</a>
                              </li>
                             </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row no-margin home-det">
                                      <div class="col-md-4 big-img">

  <!--Front Image & Update Button -->                   
                                          
  <img id="profilepicture" src="../IndexLoginSignup/imagepath/uploads/here<?php echo $image; ?>" width="300" height="300" alt="kkkkk"/>
                                         </div>

  <!-- Profile Title -->
                                      <div class="col-md-8 home-dat">
                                          <div class="detal-jumbo" style="text-align: center;">
                                          	<h1>Organization Details</h1>
                                          	<br>
  
  <!-- Table -->
                                      <div class="jumbo-address">
                                         <div class="row no-margin">
                                                  <div class="col-lg-8 no-padding" style="margin-left: 18%;">
                                              
                                                  <table class="addrss-list">
                                                      <tbody><tr>
                                                          <th>Charity Name</th>
                                                          <td><?php echo $chname; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Admin Name</th>
                                                          <td><?php echo $admin; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Country</th>
                                                          <td><?php echo $country; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Email</th>
                                                          <td><?php echo $email; ?></td>
                                                      </tr>
                                                      </tbody></table>
                                            
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                  </div>
                                </div>
    <!-- Footer -->
        <footer>
            <div class="container text-center">
                MyCharity<br>

                © 2020 FCSIT. All Rights Reserved
            </div>
        </footer>
    

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


          <!-- JavaScript -->

        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>        
        <script src="assets/js/script.js"></script>


</html>
</body>
</html>