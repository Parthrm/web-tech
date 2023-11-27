<?php

require('..\required\dbconnect.php');
    $deleteid=$_POST['deletetaskid'];
    

    

    $sql="DELETE FROM `event` WHERE event_id='$deleteid'";
        $result=mysqli_query($con,$sql);
        header("location: ..\Home\homepage.php");
        echo"task enterd";
?>