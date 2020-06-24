<?php include_once("pconfig.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$committeeID=$_GET['id'];

$sql="SELECT * from committee where committeeID=$committeeID";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
        $name = $row['name'];
$age = $row['age'];
$noPhone = $row['noPhone'];
$email = $row['email'];
$address = $row['address'];
$occupation = $row['occupation'];
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
    
    <link href="layout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="project.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="Favicon.png">
  <title>Edit Committee</title>
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
                <a href="../Committee/committee.php"><span class="glyphicon glyphicon-books" aria-hidden="true"></span>
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
      <div class="card">
        <div class="card-body">
          <h3 class="card-header text-center font-weight-bold text-uppercase py-4">ADD NEW VOLUNTEER</h3><br>
          <p class="alert alert-info">Please fill in this form to add a project. Required information is marked
            with an asterisk (*)</p>


            <form action="committeeProccess.php" method="POST">
                <input type='hidden' name="committeeID" value=<?php echo $committeeID;?>>
        <div class="form-row">
          <div class="col-md-4 mb-3 md-form">
            <label for="name">*Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $name;?>" equired> 
          </div>
          <div class="form-group col-md-1">
            <label for="id">*Age</label>
            <input id="age" class="form-control" name="age" value="<?php echo $age;?>" required>
          </div>

          <div class="form-group col-md-2">
            <label for="id">*ID Number</label>
            <input id="idnum" class="form-control" value="<?php echo $committeeID;?>"readonly>
          </div>
          

          <div class="form-group col-md-2">
            <label for="noPhone">*No Phone</label>
            <input type="text" id="noPhone" name="noPhone" class="form-control" value="<?php echo $noPhone;?>" required>
          </div>

          <div class="form-group col-md-3">
            <label for="email">*Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>" required>
          </div>
        </div>  

        <div class="form-row">
        <div class="col-md-2 mb-2 md-form">
            <label for="occupation">*Occupation</label>
            <input type="text" id="occupation" name="occupation" class="form-control" value="<?php echo $occupation;?>" required>
          </div>
          <div class="col-md-6 mb-3 md-form">
            <label for="address">*Address</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $address;?>" required>
</div>
        </div>
         

 





          <div class="pull-right"><!-- committe.php?id=$userID' -->
    
    <?php echo "<a href='viewCommittee.php?id=$committeeID'>
        <button type='button' class='btn btn-info'>Cancel</button>
        </a>
        <button  type='submit' id='update' name='update' class='btn btn-info'>Update</button>";?>
        </form>


        </div>

      </div>

    </main>
    <footer class="text-center" style="padding: 20px;">
           
      MyCharity<br>

      © 2020 FCSIT. All Rights Reserved
 
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
<?php
$conn->close();
?>