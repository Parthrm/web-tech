<?php 
    require('..\required\dbconnect.php');

    $query = "INSERT INTO `enrollment`(`user_id`, `event_id`) VALUES (".$_SESSION['userid'].",".$_SESSION['eventid'].")";
    $result = mysqli_query($con, $query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>