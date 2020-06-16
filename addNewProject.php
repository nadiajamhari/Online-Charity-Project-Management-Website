<?php include_once("pconfig.php");?>
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
  <link rel="stylesheet" type="text/css" href="addProject.css">
  <title>Add Project</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="msidenav">
      <li id="nav-item">
        <a href="profile.html"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <span>MY PROFILE</span></a>
    </li>
    <li id="nav-item">
        <a href="project.html"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            <span>PROJECTS</span></a>
    </li>
    <li id="nav-item">
        <a href="volunteer.html"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
            <span>VOLUNTEERS</span></a>
    </li>

    </div>

    <div class="fsidenav">
        <li id="nav-item">

            <a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span>SETTINGS</span></a>

        </li>
    </div>

</div>

<div id="main">

    <header>
        <div class="topnav">
            <li id="nav-item"><a style="cursor:pointer" onclick="openNav()">&#9776;</a></li>


            <a href="index.html"><img id="logo" src="logo.png" height="70px" class="d-inline-block align-top" alt="logo"></a>
            <div class="topnav-right">
                <li id="nav-item"><a href="#">Logout</a></li>
            </div>
        </div>

    </header>


    <main class="container">
      <div class="card">
        <div class="card-body">
          <h3 class="card-header text-center font-weight-bold text-uppercase py-4">PROJECT FORM DETAILS</h3><br>
          <p class="alert alert-info">Please fill in this form to add a project. Required information is marked
            with an asterisk (*)</p>
         <form action="addNewProject.php" method="post">


            <div class="form-group row">
              <label for="pname" class="col-sm-2 col-form-label"><span>*</span>Project Name</label>
              <div class="col-sm-10">
                <input type="text" name="pname" class="form-control form-control-sm" id="pname" placeholder="Project Name" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sdate"><span>*</span>Start Date</label>
                <input type="date" name="startdate" class="form-control form-control-sm" id="sdate" required>
              </div>
              <div class="form-group col-md-6">
                <label for="edate"><span>*</span>Finish Date</label>
                <input type="date" name="enddate" class="form-control form-control-sm" id="edate" required>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="plevel"><span>*</span>Participant Level</label>
                <select id="plevel" name="participantlevel" class="form-control form-control-sm" required>
                  <option value="University">University</option>
                  <option value="National">National</option>
                  <option value="International">International</option>
                  <option value="State">State</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="venue">Venue</label>
                <input type="text" name="venue" class="form-control form-control-sm" id="venue">
              </div>
              <div class="form-group col-md-4">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control form-control-sm" name="country">
                  <option value="AF">Afghanistan</option>
                  <option value="AX">Åland Islands</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BS">Bahamas (the)</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia (Plurinational State of)</option>
                  <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                  <option value="BA">Bosnia and Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory (the)</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="CV">Cabo Verde</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="KY">Cayman Islands (the)</option>
                  <option value="CF">Central African Republic (the)</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands (the)</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros (the)</option>
                  <option value="CD">Congo (the Democratic Republic of the)</option>
                  <option value="CG">Congo (the)</option>
                  <option value="CK">Cook Islands (the)</option>
                  <option value="CR">Costa Rica</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CW">Curaçao</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czechia</option>
                  <option value="CI">Côte d'Ivoire</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic (the)</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="SZ">Eswatini</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (the) [Malvinas]</option>
                  <option value="FO">Faroe Islands (the)</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories (the)</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia (the)</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GG">Guernsey</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard Island and McDonald Islands</option>
                  <option value="VA">Holy See (the)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran (Islamic Republic of)</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IM">Isle of Man</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JE">Jersey</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea (the Democratic People's Republic of)</option>
                  <option value="KR">Korea (the Republic of)</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Lao People's Democratic Republic (the)</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands (the)</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia (Federated States of)</option>
                  <option value="MD">Moldova (the Republic of)</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="ME">Montenegro</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands (the)</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger (the)</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands (the)</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestine, State of</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines (the)</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="MK">Republic of North Macedonia</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation (the)</option>
                  <option value="RW">Rwanda</option>
                  <option value="RE">Réunion</option>
                  <option value="BL">Saint Barthélemy</option>
                  <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                  <option value="KN">Saint Kitts and Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="MF">Saint Martin (French part)</option>
                  <option value="PM">Saint Pierre and Miquelon</option>
                  <option value="VC">Saint Vincent and the Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="RS">Serbia</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SX">Sint Maarten (Dutch part)</option>
                  <option value="SK">Slovakia</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia and the South Sandwich Islands</option>
                  <option value="SS">South Sudan</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SD">Sudan (the)</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard and Jan Mayen</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan (Province of China)</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania, United Republic of</option>
                  <option value="TH">Thailand</option>
                  <option value="TL">Timor-Leste</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands (the)</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates (the)</option>
                  <option value="GB">United Kingdom of Great Britain and Northern Ireland (the)</option>
                  <option value="UM">United States Minor Outlying Islands (the)</option>
                  <option value="US">United States of America (the)</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VE">Venezuela (Bolivarian Republic of)</option>
                  <option value="VN">Viet Nam</option>
                  <option value="VG">Virgin Islands (British)</option>
                  <option value="VI">Virgin Islands (U.S.)</option>
                  <option value="WF">Wallis and Futuna</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
                </select>
              </div>
            </div>


            <div class="form-group row">
              <label for="objective" class="col-sm-2 col-form-label">Objective</label>
              <div class="col-sm-10 Field1">
                <div class="pull-right">
                  <button type="button" class="btn-info addService"><span class="glyphicon glyphicon-plus-sign"
                      aria-hidden="true"></span></button></div>
                <input type="text" class="form-control form-control-sm" id="objective" name="objective[]"
                  placeholder="Objective">

              </div>
            </div>



          

          <div id="tittle">List of Comittee Members</div>

 
          <div class="form-row">
              <div class="form-group col-md-4">
                <label for="rid">Register ID</label>
                <input class="form-control form-control-sm" list="committee" id="rid" name="RegisterId">
                <datalist id="committee">
                <?php
                
                $sql = "SELECT registerID FROM committee ORDER BY committeeID";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  echo "<option value=\"".$row['registerID']."\">";
                }
              }
               ?>
                </datalist>
              </div>
              <div class="form-group col-md-4">
                <label for="nmembers">Name</label>


                <input type="text" name="NameMembers" class="form-control form-control-sm" id="nmembers">
               
              </div>
              <div class="form-group col-md-4">
                <label for="pmember">Position</label>
                <select id="pmember" class="form-control form-control-sm" name="pmember">
                <option value="Project Manager">Project Manager</option>
                  <option value="Assistant Project Manager">Assistant Project Manager</option>
                  <option value="Treasurer">Treasurer</option>
                  <option value="Vice Secretary">Vice Secretary</option>
                  <option value="Vice Treasurer">Vice Treasurer</option>
                  <option value="Media">Media Team Leader</option>
                  <option value="Logistic">Logistic Team Leader</option>
                  <option value="Safety and Welfare">Safety and Welfare Team Leader</option>
                  <option value="Registration">Registration Team Leader</option>
                  <option value="Protocol">Protocol Team Leader</option>

                </select>
                <div class="pull-right">
                  <button type="button" id="add" class="btn-info"><span class="glyphicon glyphicon-plus"
                       aria-hidden="true"></span></button></div>
              </div>
            </div>


           

       

          <div id="info">

            <table id="tab1">
              <thead>
                <th>Register ID</th>
                <th>Name</th>
                <th>Position</th>
                <th class="table-remove">Action</th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

          <div id="tittle">Activity Agenda</div>

     

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="adate">Date</label>
                <input type="date" class="form-control form-control-sm" id="adate" name="agendadate">
              </div>
              <div class="form-group col-md-2">
                <label for="atime">Time</label>
                <input type="text" name="Agenda Time" class="form-control form-control-sm" id="atime"
                  placeholder="Time">
              </div>
              <div class="form-group col-md-6">
                <label for="activity">Activity</label>
                <input type="text" class="form-control form-control-sm" id="activity" name="activity"
                  placeholder="activity">
                <div class="pull-right">
                  <button type="button" id="Add2" class="btn-info a-btn-slide-text"><span class="glyphicon glyphicon-plus-sign"
                       aria-hidden="true"></span></button></div>
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

          <table class="money" id="tab4">

            <thead>
              <th>Item</th>
              <th>Amount</th>
              <th class="table-remove">Action</th>
            </thead>
            <tbody>

              <tr>
                <td><input class="form-control form-control-sm" type="text" id="item1" name="item income"></td>
                <td><input class="form-control form-control-sm" type="number" step="any" id="income" name="income"></td>
                <td class="table-remove"><button type="button" id="Add3" class=" btn-info"><span
                      class="glyphicon glyphicon-plus-sign"  aria-hidden="true"></span></button></td>

              </tr>

            </tbody>
            <tfoot>
              <td style="text-align: right;">Total</td>
              <td></td>
              <td></td>
                          </tfoot>

          </table>


          <div id="tittle">Expenditure</div>


          <table class="money" id="tab5">

            <thead>
              <th>Item</th>
              <th>Amount</th>
              <th class="table-remove">Action</th>
            </thead>
            <tbody>
              <tr>
                <td> <input class="form-control form-control-sm" type="text" id="item2" name="item expenditure" ></td>
                <td><input class="form-control form-control-sm" type="number" step="any" id="expenditure" name="expenditure"></td>
                <td class="table-remove"><button type="button" id="Add4" class=" btn-info"><span
                      class="glyphicon glyphicon-plus-sign"  aria-hidden="true"></span></button></td>
              </tr>

            </tbody>
            <tfoot>
              <td style="text-align: right;">Total</td>
              <td></td>
              <td></td>
            </tfoot>

          </table>






          <div class="pull-right"><a href="project.html"> <button type="button"
                class="btn btn-secondary">Back</button></a>&nbsp;<button class="btn btn-info" type="submit" value="submit">Save</button></div></form>


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
  <script type="text/javascript" src="addProject.js"></script>
  <script type="text/javascript" src="layout.js"></script>

</body>

</html>
<?php
$conn->close();
?>