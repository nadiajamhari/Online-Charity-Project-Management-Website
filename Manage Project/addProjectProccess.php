<?php
include_once("pconfig.php");


$pname = $sdate = $edate  = $plevel = $venue = $country = $last_id =$objective=$ccname =$ppmember= $aadate = $aatime = $aactivity =$iitem1=$iitem2=$iincome=$eexpenditure="";
//check submit or not
// if(isset($_POST["submit"])){

if(isset($_POST['submitProject'])){
if(isset($_POST["pname"]) && isset($_POST["startdate"]) && isset($_POST["enddate"]) && isset($_POST["participantlevel"]) && isset($_POST["venue"]) && isset($_POST["country"])){

$pname = $_POST["pname"]; 
$sdate = $_POST["startdate"]; 
$edate = $_POST["enddate"]; 
$plevel = $_POST["participantlevel"]; 
$venue = $_POST["venue"]; 
$country =$_POST["country"];


//insert in database that *
$sql= "INSERT INTO project (projectName, startDate,endDate,participantLevel,venue,country)
VALUES ('$pname','$sdate','$edate','$plevel','$venue','$country')";

if($conn->query($sql)===TRUE){
    $last_id = $conn->insert_id;
}
else {
    echo "Error : " . $sql . "<br>" .$conn->error;
}
//-------------------------------------------------
//for objective
if(isset($_POST["objective"])){

 foreach ($_POST["objective"] as $objective){
    
    $o[]=$objective;

}

 for ($i=0 ; $i<sizeof($o);$i++){
$sql1 = "INSERT INTO objective (projectID, objective)
 VALUES ('$last_id','$o[$i]')";

 if($conn->query($sql1)===TRUE){
    // echo "New Record created successfully $count";
}
else {
    echo "Error : " . $sql1 . "<br>" .$conn->error;
}
}
}
//--------------------------------------
//commitee
if(isset($_POST["ccname"]) && isset($_POST["ppmember"])){

    foreach ($_POST["ccname"] as $ccname){
        
        $c[]=$ccname;
    
    }
    foreach ($_POST["ppmember"] as $ppmember){
        
        $p[]=$ppmember;
    
    }
    
    for ($i=0 ; $i<sizeof($c);$i++){
        $sql1 = "INSERT INTO list_committee (projectID, name,position)
    VALUES ('$last_id','$c[$i]','$p[$i]')";
    
    if($conn->query($sql1)===TRUE){
        // echo "New Record created successfully $count";
    }
    else {
        echo "Error : " . $sql1 . "<br>" .$conn->error;
    }
    }
}
//--------------------------------------------------------------
//agenda

        if(isset($_POST["aadate"]) && isset($_POST["aatime"]) && isset($_POST["aactivity"])){

            foreach ($_POST["aadate"] as $aadate){
                
                $a[]=$aadate;
            
            }
            foreach ($_POST["aatime"] as $aatime){
                
                $t[]=$aatime;
            
            }
            foreach ($_POST["aactivity"] as $aactivity){
                
                $d[]=$aactivity;
            
            }
            for ($i=0 ; $i<sizeof($a);$i++){
                $sql1 = "INSERT INTO agenda (projectID, dateevent,timeevent,activity)
            VALUES ('$last_id','$a[$i]','$t[$i]','$d[$i]')";
            
            if($conn->query($sql1)===TRUE){
                // echo "New Record created successfully $count";
            }
            else {
                echo "Error : " . $sql1 . "<br>" .$conn->error;
            }
            }
        }
        //------------------------------------------------//
        //income

            if(isset($_POST["iitem1"]) && isset($_POST["iincome"])){

                $total=0;

                foreach ($_POST["iitem1"] as $iitem1){
                    
                    $e[]=$iitem1;
                
                }
                foreach ($_POST["iincome"] as $iincome){
                    
                    $n[]=$iincome;
                    $total=$total+$iincome;

                
                }
                
                for ($i=0 ; $i<sizeof($e);$i++){
                    $sql = "INSERT INTO income (projectID, item,amount)
                VALUES ('$last_id','$e[$i]','$n[$i]')";
                
                if($conn->query($sql)===TRUE){
                }
                else {
                    echo "Error : " . $sql . "<br>" .$conn->error;
                }
                }

                //insert total to total income
                
                $sql1 ="INSERT INTO total_income(projectID,amount) VALUES ('$last_id','$total')";
                if($conn->query($sql1)===TRUE){
                    echo "total amount dapat masuk";
                }
                else {
                    echo "Error : " . $sql1 . "<br>" .$conn->error;
                }
                

            }
//----------------------------------------------------------------------
//expenditure

                if(isset($_POST["iitem2"]) && isset($_POST["eexpenditure"])){
                    $total=0;

                    foreach ($_POST["iitem2"] as $iitem2){
                        
                        $y[]=$iitem2;
                    
                    }
                    foreach ($_POST["eexpenditure"] as $eexpenditure){
                        
                        $h[]=$eexpenditure;
                        $total = $total + $eexpenditure;
                    
                    }
                    
                    for ($i=0 ; $i<sizeof($y);$i++){
                        $sql = "INSERT INTO expenditure (projectID, item,amount)
                    VALUES ('$last_id','$y[$i]','$h[$i]')";
                    
                    if($conn->query($sql)===TRUE){
                        // echo "New Record created successfully $count";
                    }
                    else {
                        echo "Error : " . $sql1 . "<br>" .$conn->error;
                    }
                    }
                    $sql1 ="INSERT INTO total_expenditure(projectID,amount) VALUES ('$last_id','$total')";
                if($conn->query($sql1)===TRUE){
                    echo "total amount dapat masuk1";
                }
                else {
                    echo "Error : " . $sql1 . "<br>" .$conn->error;
                }
                


    }
    //-----------------------------------------------------
}
$conn->close();
// echo "<html><script> window.location.href=\"project.php\";</script></html>";
}

if(isset($_POST['updateProject'])){

 $projectID = $_POST['projectID'];
 $pname = $_POST["pname"]; 
 $sdate = $_POST["startdate"]; 
 $edate = $_POST["enddate"]; 
 $plevel = $_POST["participantlevel"]; 
 $venue = $_POST["venue"]; 
 $country =$_POST["country"];

//  insert part 1
$sql = "UPDATE project SET projectName='$pname',startDate='$sdate',endDate='$edate', 
 participantLevel='$plevel',venue='$venue',country='$country' WHERE projectID=$projectID";

 if (mysqli_query($conn, $sql)) {
//   echo "Record updated successfully";
 } else {
   echo "Error updating record: " . mysqli_error($conn);
 }

//-------------------------------------------------
//for objective
$sql = "DELETE FROM objective WHERE projectID=$projectID";

    if ($conn->query($sql) === TRUE) {
    //   echo "Record deleted successfully1";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
 if(isset($_POST["objective"])){



  foreach ($_POST["objective"] as $objective){
    
    $o[]=$objective;

 }

 for ($i=0 ; $i<sizeof($o);$i++){
    $sql1 = "INSERT INTO objective (projectID, objective)
 VALUES ('$projectID','$o[$i]')";

 if($conn->query($sql1)===TRUE){
    // echo "New Record created successfully $count";
 }
 else {
    echo "Error : " . $sql1 . "<br>" .$conn->error;
 }
 }
}
//--------------------------------------
//commitee
$sql = "DELETE FROM list_committee WHERE projectID=$projectID";

    if ($conn->query($sql) === TRUE) {
    //   echo "Record deleted successfully2";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
 if(isset($_POST["ccname"]) && isset($_POST["ppmember"])){


    foreach ($_POST["ccname"] as $ccname){
        
        $c[]=$ccname;
    
    }
    foreach ($_POST["ppmember"] as $ppmember){
        
        $p[]=$ppmember;
    
    }
    
    for ($i=0 ; $i<sizeof($c);$i++){
        $sql1 = "INSERT INTO list_committee (projectID, name,position)
    VALUES ('$projectID','$c[$i]','$p[$i]')";
    
    if($conn->query($sql1)===TRUE){
        // echo "New Record created successfully $count";
    }
    else {
        echo "Error : " . $sql1 . "<br>" .$conn->error;
    }
    }
}
//--------------------------------------------------------------
//agenda
 $sql = "DELETE FROM agenda WHERE projectID=$projectID";

    if ($conn->query($sql) === TRUE) {
    //   echo "Record deleted successfully3";
    } else {
      echo "Error deleting record: " . $conn->error;
    }


        if(isset($_POST["aadate"]) && isset($_POST["aatime"]) && isset($_POST["aactivity"])){
    
            foreach ($_POST["aadate"] as $aadate){
                
                $a[]=$aadate;
            
            }
            foreach ($_POST["aatime"] as $aatime){
                
                $t[]=$aatime;
            
            }
            foreach ($_POST["aactivity"] as $aactivity){
                
                $d[]=$aactivity;
            
            }
            for ($i=0 ; $i<sizeof($a);$i++){
                $sql1 = "INSERT INTO agenda (projectID, dateevent,timeevent,activity)
            VALUES ('$projectID','$a[$i]','$t[$i]','$d[$i]')";
            
            if($conn->query($sql1)===TRUE){
                // echo "New Record created successfully $count";
            }
            else {
                echo "Error : " . $sql1 . "<br>" .$conn->error;
            }
            }
        }
        //------------------------------------------------//
        //income
 $sql = "DELETE FROM income WHERE projectID=$projectID";
 $sql2 = "DELETE FROM total_income where projectID=$projectID";

        if (($conn->query($sql) && $conn->query($sql2)) === TRUE) {
        //   echo "Record deleted successfully4";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
            if(isset($_POST["iitem1"]) && isset($_POST["iincome"])){

                $total=0;
          

                foreach ($_POST["iitem1"] as $iitem1){
                    
                    $e[]=$iitem1;
                
                }
                foreach ($_POST["iincome"] as $iincome){
                    
                    $n[]=$iincome;
                    $total=$total+$iincome;
                
                }
                
                for ($i=0 ; $i<sizeof($e);$i++){
                    $sql = "INSERT INTO income (projectID, item,amount)
                VALUES ('$projectID','$e[$i]','$n[$i]')";
                
                if($conn->query($sql)===TRUE){
                    // echo "New Record created successfully $count";
                }
                else {
                    echo "Error : " . $sql . "<br>" .$conn->error;
                }
                }

                $sql1 ="INSERT INTO total_income(projectID,amount) VALUES ('$projectID','$total')";
                if($conn->query($sql1)===TRUE){
                    // echo "total amount dapat masuk1";
                }
                else {
                    echo "Error : " . $sql1 . "<br>" .$conn->error;
                }
                
            }
//----------------------------------------------------------------------
// expenditure
$sql = "DELETE FROM expenditure WHERE projectID=$projectID";
$sql2 = "DELETE FROM total_expenditure where projectID=$projectID";

    if (($conn->query($sql) && $conn->query($sql2)) === TRUE) {
        // echo "Record deleted successfully5";
      } else {
        echo "Error deleting record: " . $conn->error;
      }

                if(isset($_POST["iitem2"]) && isset($_POST["eexpenditure"])){

                    $total=0;

                    

                    foreach ($_POST["iitem2"] as $iitem2){
                        
                        $y[]=$iitem2;
                    
                    }
                    foreach ($_POST["eexpenditure"] as $eexpenditure){
                        
                        $h[]=$eexpenditure;
                        $total=$total+$eexpenditure;
                    
                    }
                    
                    for ($i=0 ; $i<sizeof($y);$i++){
                        $sql = "INSERT INTO expenditure (projectID, item,amount)
                    VALUES ('$projectID','$y[$i]','$h[$i]')";
                    
                    if($conn->query($sql)===TRUE){
                        // echo "New Record created successfully $count";
                    }
                    else {
                        echo "Error : " . $sql . "<br>" .$conn->error;
                    }
                    }
                    $sql1 ="INSERT INTO total_expenditure(projectID,amount) VALUES ('$projectID','$total')";
                    if($conn->query($sql1)===TRUE){
                        // echo "total amount dapat masuk1";
                    }
                    else {
                        echo "Error : " . $sql1 . "<br>" .$conn->error;
                    }
                    
    }
    //-----------------------------------------------------
    mysqli_close($conn);
    echo "<html><script> window.location.href=\"viewProject.php?id=$projectID\";</script></html>";
}
