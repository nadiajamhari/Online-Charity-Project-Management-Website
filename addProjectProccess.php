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

                foreach ($_POST["iitem1"] as $iitem1){
                    
                    $e[]=$iitem1;
                
                }
                foreach ($_POST["iincome"] as $iincome){
                    
                    $n[]=$iincome;
                
                }
                
                for ($i=0 ; $i<sizeof($e);$i++){
                    $sql1 = "INSERT INTO income (projectID, item,amount)
                VALUES ('$last_id','$e[$i]','$n[$i]')";
                
                if($conn->query($sql1)===TRUE){
                    // echo "New Record created successfully $count";
                }
                else {
                    echo "Error : " . $sql1 . "<br>" .$conn->error;
                }
                }
            }
//----------------------------------------------------------------------
//expenditure

                if(isset($_POST["iitem2"]) && isset($_POST["eexpenditure"])){

                    foreach ($_POST["iitem2"] as $iitem2){
                        
                        $y[]=$iitem2;
                    
                    }
                    foreach ($_POST["eexpenditure"] as $eexpenditure){
                        
                        $h[]=$eexpenditure;
                    
                    }
                    
                    for ($i=0 ; $i<sizeof($y);$i++){
                        $sql1 = "INSERT INTO expenditure (projectID, item,amount)
                    VALUES ('$last_id','$y[$i]','$h[$i]')";
                    
                    if($conn->query($sql1)===TRUE){
                        // echo "New Record created successfully $count";
                    }
                    else {
                        echo "Error : " . $sql1 . "<br>" .$conn->error;
                    }
                    }
    }
    //-----------------------------------------------------
}
$conn->close();
echo "<html><script> window.location.href=\"project.php\";</script></html>";
}

if(isset($_POST['updateProject'])){
    echo "test";

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
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

//-------------------------------------------------
//for objective
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

            if(isset($_POST["iitem1"]) && isset($_POST["iincome"])){

                foreach ($_POST["iitem1"] as $iitem1){
                    
                    $e[]=$iitem1;
                
                }
                foreach ($_POST["iincome"] as $iincome){
                    
                    $n[]=$iincome;
                
                }
                
                for ($i=0 ; $i<sizeof($e);$i++){
                    $sql1 = "INSERT INTO income (projectID, item,amount)
                VALUES ('$projectID','$e[$i]','$n[$i]')";
                
                if($conn->query($sql1)===TRUE){
                    // echo "New Record created successfully $count";
                }
                else {
                    echo "Error : " . $sql1 . "<br>" .$conn->error;
                }
                }
            }
//----------------------------------------------------------------------
//expenditure

                if(isset($_POST["iitem2"]) && isset($_POST["eexpenditure"])){

                    foreach ($_POST["iitem2"] as $iitem2){
                        
                        $y[]=$iitem2;
                    
                    }
                    foreach ($_POST["eexpenditure"] as $eexpenditure){
                        
                        $h[]=$eexpenditure;
                    
                    }
                    
                    for ($i=0 ; $i<sizeof($y);$i++){
                        $sql1 = "INSERT INTO expenditure (projectID, item,amount)
                    VALUES ('$projectID','$y[$i]','$h[$i]')";
                    
                    if($conn->query($sql1)===TRUE){
                        // echo "New Record created successfully $count";
                    }
                    else {
                        echo "Error : " . $sql1 . "<br>" .$conn->error;
                    }
                    }
    }
    //-----------------------------------------------------
    mysqli_close($conn);
    echo "<html><script> window.location.href=\"viewProject.php?id=$projectID\";</script></html>";
}


?>