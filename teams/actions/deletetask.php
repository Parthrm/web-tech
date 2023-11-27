<?php

require('..\..\required\dbconnect.php');
    $deleteid=$_POST['deletetaskid'];
    

    

    $sql="DELETE FROM `teamtask` WHERE task_id='$deleteid'";
        $result=mysqli_query($con,$sql);
        header('location: ../teamview.php?teamid='.$_SESSION['teamid']);
        echo"task enterd";
?>