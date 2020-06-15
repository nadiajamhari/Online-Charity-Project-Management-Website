

<?php
include_once("pconfig.php");
$pname = $sdate = $edate  = $plevel = $venue = $country = $last_id = "";
$count =0;

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
    echo "New Record created successfully 1";
    $last_id = $conn->insert_id;
}
else {
    echo "Error : " . $sql . "<br>" .$conn->error;
}


if(isset($_POST["objective"])){

foreach ($_POST["objective"] as $objective){
    
    $o[]=$objective;

}

for ($i=0 ; $i<sizeof($o);$i++){
    $sql1 = "INSERT INTO objective (projectID, objective)
VALUES ('$last_id','$o[$count]')";
$count++;

if($conn->query($sql1)===TRUE){
    echo "New Record created successfully $count";
}
else {
    echo "Error : " . $sql1 . "<br>" .$conn->error;
}
}
}


$conn->close();
?>
