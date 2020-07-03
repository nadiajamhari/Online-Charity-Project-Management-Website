<?php

    $databaseHost='localhost';
    $databaseName='mycharity';
    $databaseUsername='mycharity';
    $databasePassword='mycharity123';

    $conn=new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }else {
        
    }

?>