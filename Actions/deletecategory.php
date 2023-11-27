<?php

require('..\required\dbconnect.php');
    $deleteid=$_POST['deletecategoryid'];
    echo($deleteid);
    $sql="SELECT * FROM `category` WHERE category_name='$deleteid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $deleteid=$row['category_id'];
    $sql="DELETE  FROM `event` WHERE category_id='$deleteid'";
    $result=mysqli_query($con,$sql);
    $sql="DELETE FROM `category` WHERE category_id='$deleteid'";
    $result=mysqli_query($con,$sql);
    header("location: ..\Home\homepage.php");
        echo"task enterd";
?>