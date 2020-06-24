<?php include_once("pconfig.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$committeeID=$_GET['id'];

$sql="SELECT name From committee where committeeID=$committeeID";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $name=$row['name'];
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
    <link href="viewCommittee.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="Favicon.png">
  <title>Committee</title>
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
                <a href="../Committee/committee.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
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
          <h3 class="card-header text-center font-weight-bold text-uppercase py-4"><?php echo $name?></h3><br>
          <?php

            $sql = "SELECT * FROM committee where committeeID=$committeeID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
               ?>
        
            
                <table>

                    <thead>
                        <th id="issue"></th>
                        <th></th>
                        <th id="details"></th>
                    </thead>


                    <tbody>

                        <tr>
                            <td><strong>Name</strong></td>
                            <td>:</td>
                            <td><?php echo $row['name']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Age</strong></td>
                            <td>:</td>
                            <td><?php echo $row['age']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>No. Phone</strong></td>
                            <td>:</td>
                            <td><?php echo $row['noPhone']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Email</strong></td>
                            <td>:</td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Address</strong></td>
                            <td>:</td>
                            <td><?php echo $row['address']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Occupation</strong></td>
                            <td>:</td>
                            <td><?php echo $row['occupation'];?>
                           </td>
                        </tr>

                  <?php  }
                } ?>




                    </tbody>
                </table>
            
            <!-- Button edit or back -->
            <div class="pull-right">

                <?php echo "<a href='editCommittee.php?id=$committeeID'>
                                <button type='submit' class='btn btn-info'>Edit
                                </button></a>&nbsp; <a href='committee.php'>
                                <button type='submit' class='btn btn-info'> Back
                                </button></a></div>"; ?>
             </div>
             </div>
        </div>
    

    </main>
    <footer class="container text-center">
           
      MyCharity<br>

      © 2020 FCSIT. All Rights Reserved
 
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

</body>

</html>
<?php
$conn->close();
?>