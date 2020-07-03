<?php
  session_start();
  $userID=$_SESSION['userID'];
  $_SESSION['login'] = true;
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
    <link rel="icon" href="Favicon.png">
    
    <title>Add New Volunteer</title>
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
                <a href="../Committee/committee.php"><span class="glyphicon glyphicon-books" aria-hidden="true"></span>
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
    <main class="container">
      <h2 class="text-center">New Volunteer Information</h2> 
      <p class="alert alert-info">Please fill in this form to add a new volunteer. Required information is marked with an asterisk (*)</p>


      <form method="POST" action="processform.php">

        <div class="form-row">
          <div class="col-md-4 mb-3 md-form">
            <label for="name">*Name</label>
            <input type="text" id="name" name="name" class="form-control" required> 
          </div>

          <div class="form-group col-md-1">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" id="age" required>
          </div>

          <div class="form-group col-md-3">
            <label for="occupation">Occupation</label>
            <input type="text" name="occupation"class="form-control" id="occupation">
          </div>

          <div class="form-group col-md-2">
            <label for="phonenum">*No Phone</label>
            <input type="number" id="phonenum" name="phonenum" class="form-control" required>
          </div>

          <div class="form-group col-md-3">
            <label for="email">*Email</label>
            <input type="email" id="email"  name="email" class="form-control" required>
          </div>
        
          <div class="form-group col-md-6">
            <label for="address">*Address</label>
            <input type="text" id="address" name="address" class="form-control" required>
          </div>

          <div class='form-group col-md-3'>
            <label for="preferredRole">*Preferred Role</label>
            <input type='text' id='preferredRole' name="preferredRole" class="form-control">
          </div>
        </div>
        <span class="pull-left">
            <div class="form-group col-md-8"></div>
            <br>
            <a href="viewvolunteer.php">
            <button type="button" class="btn btn-secondary" name='cancel'>Cancel</button>
            </a>

            <button type="submit" class="btn btn-info save-btn" name='submit' value='Save'>Submit</button>
            </div>
        </span>

      </form>
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
        <script type="text/javascript" src="deletevolunteer.js"></script>
      </body>
      </html>
     
