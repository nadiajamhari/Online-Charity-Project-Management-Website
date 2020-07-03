<!-- handle delete from database -->
<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['login'] = true;
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    

                    if (isset($_GET["vol"])&&isset($_GET["proj"])){
                        
                        echo '<script>console.log("masuk2");</script>';
                        include 'configAP.php';
                        //delete from database
                        $querydelete="DELETE FROM `volunteer_project` WHERE idnumber=".$_GET["vol"]." AND projectID=".$_GET["proj"];
                        $result = mysqli_query($mysqli,$querydelete);
                        if($result){
                            //display sucessful
                            $message = "Volunteer Deleted";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //refresh page
                            $URL="assignProject.php?id=".$_GET["proj"];
                            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                            
                        }
                        else{
                            echo '<script>console.log("delete fail");</script>';
                        }
                        
                    }
                }
                mysqli_close($mysqli);
            ?>