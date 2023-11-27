<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="eventhorizon";
    
    $con=mysqli_connect($server,$username,$password,$database);
    if(!$con){
        echo "error";
    }
    session_start();
    // echo "started";
    $_SESSION['curcategory']=-1;
    $_SESSION['user_id']=13;
?>