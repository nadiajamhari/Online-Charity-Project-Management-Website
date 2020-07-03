<?php
include_once("config.php");
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE meetingID=$id";
    $result = mysqli_query($conn, $sql);

    
    
    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];

    if($filepath == 'uploads/'){
        die ("Unavailable");
    }
    else{
    echo $filepath;
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE meetingID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }
    }
    
    

}
?>