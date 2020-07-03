<?php
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;
// html for table1 and table2
echo '<div class="card">
<h3 style="background-color:rgb(255, 139, 112); color: white; font-size:30px;" class="card-header text-center font-weight-bold text-uppercase py-4">VOLUNTEER(S) AVAILABLE</h3>
<div class="card-body">
<div id="table1">

    <table class="table table-bordered table-striped text-center">
    <thead>
        <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Volunteer Name</th>
        <th class="text-center">View</th>
        <th class="text-center">Add</th>
        </tr>
    </thead>
     <tbody><form id="confirmform" action="selectVolunteerAdd.php" method="POST"></form>';

    //loop volunteers available 
    $query_available = "SELECT volunteer.idnumber, volunteer.name
    FROM volunteer
    WHERE volunteer.userID=".$userID." AND volunteer.idnumber NOT IN
    (SELECT volunteer_project.idnumber
    FROM volunteer_project)
    ORDER BY idnumber";

    $result = mysqli_query($mysqli,$query_available);
     while($row = mysqli_fetch_array($result))
     {
     echo "<tr>";
     echo '<td class="pt-3-half">' . $row['idnumber'] . '</td>';
     echo '<td class="pt-3-half">' . $row['name'] . '</td>';
     echo '<td class="text-center"><span><button class="btn-default btn-rounded btn-sm my-0" id='.$row['idnumber'].'
            ><i class="glyphicon glyphicon-folder-open"></i></button></span></td>';
     echo '<td><div style="padding-right : 20px;">
                    <input type="checkbox" form="confirmform" class="form-check-input" style="cursor: pointer;height: 20px;
                        width: 20px;" name="vol[]" value="'.$row['idnumber'].'">
                    <td class="hidden"><input type="checkbox" form="confirmform" class="form-check-input" name="user" value="'.$userID.'"checked="yes"></td>
                    <td class="hidden"><input type="checkbox" form="confirmform" class="form-check-input" name="pro" value="'.$proID.'"checked="yes"></td>
                </div>
            </td>';
     echo '</tr>';
     }
    
     
     // generate table2
     echo ' </tbody>
            </table>
        </div>
        </div>
        </div>';

       
?>