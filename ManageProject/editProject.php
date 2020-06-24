<?php
include_once("pconfig.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;
$projectId = $_GET['id'];

//declare check
$c1=$c2=$c3=$c4= $c5=0;
// fetch at table project
$sql = "SELECT * FROM project Where projectID=$projectId";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  $projectName = $row["projectName"];
  $startDate = $row["startDate"];
  $endDate = $row["endDate"];
  $participantLevel = $row["participantLevel"];
  $venue = $row["venue"];
  $country = $row["country"];
}

// fetch data objective
$sql1 = "SELECT objective from objective where projectID=$projectId";
$result1=$conn->query($sql1);

if($result1->num_rows>0){
$c1=1;

$objective=array();

while($row=$result1->fetch_object()){
  $objective[] =$row;
}
}

// fetch all name  and position of committee
$sql2 = "SELECT name from list_committee where projectID=$projectId";
$sql3 = "SELECT position from list_committee where projectID=$projectId";
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$cname = array();
$position = array();
if($result2->num_rows>0){
$c2=1;
while ($row = $result2 -> fetch_object() ){
  $name[]=$row;
  
}
while ($row = $result3->fetch_object()){
  $position[]=$row;

}
}

// fetch all activity agenda
$sql4 = "SELECT dateevent from agenda where projectID=$projectId";
$sql5 = "SELECT timeevent from agenda where projectID=$projectId";
$sql6 = "SELECT activity from agenda where projectID=$projectId";
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$result6= $conn->query($sql6);
if($result4->num_rows>0){
$c3=1;
$dateevent = array();
$timeevent = array();
$activity = array();
while ($row = $result4 -> fetch_object() ){
  $dateevent[]=$row;
  
}
while ($row = $result5->fetch_object()){
  $timeevent[]=$row;

}
while ($row = $result6->fetch_object()){
  $activity[]=$row;

}
}
// income
$sql7="SELECT itemincome from income where projectID=$projectId";
$sql8="SELECT amountincome from income where projectID=$projectId";
$result7=$conn->query($sql7);
$result8=$conn->query($sql8);
if($result7->num_rows>0){
  $c4=1;
  $itemincome=array();
  $amountincome=array();
  while($row = $result7->fetch_object()){
    $itemincome[]=$row;
  }
  while($row = $result8->fetch_object()){

    $amountincome[]=$row;
    
  }
}
// expenditure
$sql9="SELECT itemexpenditure from expenditure where projectID=$projectId";
$sql10="SELECT amountexpenditure from expenditure where projectID=$projectId";
$result9=$conn->query($sql9);
$result10=$conn->query($sql10);
if($result9->num_rows>0){
  $c5=1;
  $itemexpenditure=array();
  $amountexpenditure=array();
  while($row = $result9->fetch_object()){
    $itemexpenditure[]=$row;
  }
  while($row = $result10->fetch_object()){

    $amountexpenditure[]=$row;
    
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="layout.css">
  <link rel="stylesheet" type="text/css" href="addProject.css">
  <link rel="icon" href="Favicon.png">
  <title>Edit Project</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="msidenav">
            <li id="nav-item">
                <a href="../Profile/profile.php><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
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
          <h3 class="card-header text-center font-weight-bold text-uppercase py-4">PROJECT FORM DETAILS</h3><br>
          <p class="alert alert-info">Please fill in this form to add a project. Required information is marked
            with an asterisk (*)</p>
          <form action="addProjectProccess.php" method="POST">
          <?php echo "<input type='hidden' name='projectID' value=" . $_GET['id'] . "> "; ?>

              <div class="form-group row">
              <label for="pname" class="col-sm-2 col-form-label"><span>*</span>Project Name</label>
              <div class="col-sm-10">
                <input name="pname" type="text" class="form-control form-control-sm" id="pname" value="<?php echo $projectName ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sdate"><span>*</span>Start Date</label>
                <input type="date" name="startdate" class="form-control form-control-sm" id="sdate" value="<?php echo $startDate ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="edate"><span>*</span>Finish Date</label>
                <input type="date" name="enddate" class="form-control form-control-sm" id="edate" value="<?php echo $endDate ?>" required>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="plevel"><span>*</span>Participant Level</label>
                <select name="participantlevel" id="plevel" class="form-control form-control-sm" value="<?php echo $participantLevel ?>" required>
                <option selected disable hidden><?php echo $participantLevel?></option>
                <option value="University">University</option>
                  <option value="National">National</option>
                  <option value="International">International</option>
                  <option value="State">State</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="venue"><span>*</span>Venue</label>
                <input type="text" name="venue" class="form-control form-control-sm" value="<?php echo $venue ?>" id="venue" required>
              </div>
              <div class="form-group col-md-4">
                
                <label for="country"><span>*</span>Country</label>
                <select name="country" id="country" class="form-control form-control-sm"  value="<?php echo $country;?>" required>
                  <option  selected disable hidden><?php echo $country; ?></option>
                  <option value="Afganistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bonaire">Bonaire</option>
                  <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Canary Islands">Canary Islands</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Channel Islands">Channel Islands</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos Island">Cocos Island</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote DIvoire">Cote DIvoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Curaco">Curacao</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands">Falkland Islands</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Ter">French Southern Ter</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Great Britain">Great Britain</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="India">India</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea North">Korea North</option>
                  <option value="Korea Sout">Korea South</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau">Macau</option>
                  <option value="Macedonia">Macedonia</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Midway Islands">Midway Islands</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Nambia">Nambia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherland Antilles">Netherland Antilles</option>
                  <option value="Netherlands">Netherlands (Holland, Europe)</option>
                  <option value="Nevis">Nevis</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau Island">Palau Island</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Phillipines">Philippines</option>
                  <option value="Pitcairn Island">Pitcairn Island</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Republic of Montenegro">Republic of Montenegro</option>
                  <option value="Republic of Serbia">Republic of Serbia</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="St Barthelemy">St Barthelemy</option>
                  <option value="St Eustatius">St Eustatius</option>
                  <option value="St Helena">St Helena</option>
                  <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                  <option value="St Lucia">St Lucia</option>
                  <option value="St Maarten">St Maarten</option>
                  <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                  <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                  <option value="Saipan">Saipan</option>
                  <option value="Samoa">Samoa</option>
                  <option value="Samoa American">Samoa American</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Tahiti">Tahiti</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Erimates">United Arab Emirates</option>
                  <option value="United States of America">United States of America</option>
                  <option value="Uraguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City State">Vatican City State</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                  <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                  <option value="Wake Island">Wake Island</option>
                  <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zaire">Zaire</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>
            </div>
 
          <?php
            if($c1==1){

            echo "<table><tr><td><strong>Current Objective</strong></td></tr>";

            foreach($objective as $Value){
              echo "<tr><td><input type='text' class='form-control-sm' id='objective' name='objective[]' value='$Value->objective'>
              <div class='pull-right'><button type='button' 
              <span class='btn-danger glyphicon glyphicon-remove removeob' aria-hidden='true'></span></button></td></div></tr>";
            }

            echo "</table>";
          }
          ?>


            <div class="form-group row">



              <label for="objective" class="col-sm-4 col-form-label">Add More Objective</label>
              <div class="col-sm-8 Field1">

                <button type="button" class="btn btn-info addService"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>Add More</button>

              </div>
            </div>

          <div id="tittle">List of Comittee Members</div>

         <?php
            if($c2==1){

            echo "<table><tr><td><strong>Current Committee</strong></td></tr>";
            $fullname=array();
            foreach ($name as $key => $Value){
              $fullname[$key]=$Value->name;
            }  $count=0;
              foreach($position as $Value){
              echo "<tr class='text-center' ><td><input type=hidden ></td><td><input type='text' class='form-control-sm' id='cccname' name='committeename[]' value='$fullname[$count]'>
              <td><input class='form-control-sm' id='ppmember' name='ppmember[]' value='$Value->position'></td>  
              <td><button type'button' <span class='btn-danger glyphicon glyphicon-remove removecommittee' aria-hidden='true'></span></button></td></tr>";
              $count++;
            }
            echo "</table><br>";
          }
         ?>            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="rid">Name</label>
                <input class="form-control form-control-sm" list="committee" id="rid" name="cname">
                <datalist id="committee">
                  <?php

                  $sql = "SELECT name FROM committee ORDER BY committeeID";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value=\"" . $row['name'] . "\">";
                    }
                  }
                  ?>
                </datalist>
              </div>
              <div class="form-group col-md-6">
                <label for="pmember">Position</label>
                <select id="pmember" class="form-control form-control-sm" name="pmember">
                <option value="" selected disabled>Please select position</option>
                  <option value="Project Manager">Project Manager</option>
                  <option value="Assistant Project Manager">Assistant Project Manager</option>
                  <option value="Treasurer">Treasurer</option>
                  <option value="Vice Secretary">Vice Secretary</option>
                  <option value="Vice Treasurer">Vice Treasurer</option>
                  <option value="Media and Publicity">Media and Publicity</option>
                  <option value="Logistic">Logistic</option>
                  <option value="Safety and Welfare">Safety and Welfare</option>
                  <option value="Registration">Registration</option>
                  <option value="Protocol">Protocol</option>
                </select>
                <div class="pull-right">
                  <button type="button" id="add" class="btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></div>
              </div>
            </div>




            <div id="info">

              <table id="tab1">
                <thead>
                  <th class="c1">Name</th>
                  <th class="c2">Position</th>
                  <th class="table-remove">Action</th>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <div id="tittle">Activity Agenda</div>

            <?php
             if($c3==1){
            $eventdate=array();
            $eventtime=array();

            foreach ($dateevent as $key => $Value){
              $eventdate[$key]=$Value->dateevent;
            }
            foreach($timeevent as $key => $Value){
              $eventtime[$key]=$Value->timeevent;
            }
            $count=0;
            echo "<table><tr><td><strong>Current Agenda</strong></td></tr>";


              foreach($activity as $Value){      
 
                echo "<tr class='text-center's>
                   <td><input class='form-control-sm' id='aadate' name='aadate[]' value='$eventdate[$count]'>
                   <input class='form-control-sm' id='aatime' name='aatime[]' value='$eventtime[$count]'>
                   <input class='form-control-sm' id='aactivity' name='aactivity[]' value='$Value->activity'>
                   <button type='button' <span class='btn-danger glyphicon glyphicon-remove removeagenda' aria-hidden='true'></span></button></td>
                   </tr>";
              }
              echo "</table><br>";
            }
             ?>



            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="adate">Date</label>
                <input type="date" class="form-control form-control-sm" id="adate" name="agenda date">
              </div>
              <div class="form-group col-md-2">
                <label for="atime">Time</label>
                <input type="time" name="Agenda Time" class="form-control form-control-sm" id="atime" placeholder="Time">
              </div>
              <div class="form-group col-md-6">
                <label for="activity">Activity</label>
                <input type="text" class="form-control form-control-sm" id="activity" name="activity" placeholder="activity">
                <div class="pull-right">
                  <button type="button" id="Add2" class="btn-info a-btn-slide-text"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>
              </div>
            </div>


            <table id="tab3">

              <thead>
                <th>Date</th>
                <th>Time</th>
                <th>Activity</th>
                <th class="table-remove">Action</th>
              </thead>
              <tbody>

              </tbody>
            </table>



            <div id="tittle">Income</div>

            <?php
             if($c4==1){

            $arrayofincome=array();

            foreach($itemincome as $key => $Value){
              $arrayofincome[$key]=$Value->itemincome;
            }
            $count=0;
            echo "<table><tr><td><strong>Current Income</strong></td></tr>";
            foreach($amountincome as $Value){

              echo "<tr class='text-center'><td><input type=hidden ></td><td><input class='form-control-sm' id='iitem1' name='incomeitem[]' value='$arrayofincome[$count]'></td>
              <td><input class='form-control-sm' id='iincome' name='incomeamount[]' value='$Value->amountincome'></td>
              <td><button type='button' <span class='btn-danger glyphicon glyphicon-remove removeincome' aria-hidden='true'></span></button></td></tr>";
              $count++;
            }

              echo "</table><br>";
          }
            ?>
             

             <div class="form-row">
              <div class="form-group col-md-6">
                <label >Item</label>
                <input class="form-control form-control-sm" type="text" id="item1" name="item income">
              </div>
              <div class="form-group col-md-6">
                <label>Amount</label>
                <input class="form-control form-control-sm" type="number" step="any" id="income" name="income">
                <div class="pull-right">
              <button type="button" id="Add3" class=" btn-info"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            </div>
              </div>
              
              </div>
           



            <table class="money" id="tab4">
   
              <thead>
                <th>Item</th>
                <th>Amount</th>
                <th class="table-remove">Action</th>
              </thead>
              <tbody>

                <tr>

                </tr>

              </tbody>
            </table>


            <div id="tittle">Expenditure</div>

            <?php
              if($c5==1){

             
              $arrayOfExpenditure=array();

              foreach($itemexpenditure as $key => $Value){
                $arrayOfExpenditure[$key]=$Value->itemexpenditure;
              }
              $count=0;
              echo "<table><tr><td><strong>Current Expenditure</strong></td></tr>";
              foreach($amountexpenditure as $Value){

                echo "<tr class='text-center'><td><input type=hidden ></td><td><input class='form-control-sm' id='iitem1' name='expenditureitem[]' value='$arrayOfExpenditure[$count]'></td>
                <td><input class='form-control-sm' id='iincome' name='expenditureamount[]' value='$Value->amountexpenditure'></td><td>
                <button type='button' <span class='btn-danger glyphicon glyphicon-remove removeincome' aria-hidden='true'></span></button></td></tr>";
                $count++;
              }

              echo "</table><br>";
            }
            ?>
                     <div class="form-row">
              <div class="form-group col-md-6">
                <label >Item</label>
                <input class="form-control form-control-sm" type="text" id="item2" name="item2">
              </div>
              <div class="form-group col-md-6">
                <label>Amount</label>
                <input class="form-control form-control-sm" type="number" step="any" id="expenditure" name="expenditure">
                <div class="pull-right">
                <button type="button" id="Add4" class=" btn-info"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            </div>
              </div>
              
              </div>

            <table class="money" id="tab5">

              <thead>
                <th>Item</th>
                <th>Amount</th>
                <th class="table-remove">Action</th>
              </thead>
              <tbody>
               

              </tbody>


            </table>






            <div class="pull-right">
            <?php
            echo "<a href='viewProject.php?id=$projectId'> <button type='button' class='btn btn-secondary'>Back</button></a>&nbsp;<button class='btn btn-info' type='submit' name='updateProject'>Save</button>";?></div>
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="addProject.js"></script>
  <script type="text/javascript" src="layout.js"></script>

</body>

</html>
<?php
$conn->close();
?>