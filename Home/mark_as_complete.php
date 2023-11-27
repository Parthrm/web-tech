<?php
    require('..\required\dbconnect.php');
    $query = 'SELECT * FROM  `event` WHERE event_id='.$_GET['event_id'];
    $row=mysqli_query($con,$query)->fetch_assoc();
    if($row['completed'])
    {
        $query = 'UPDATE `event` SET `completed`= 0 WHERE event_id='.$_GET['event_id'];
    }
    else
    {
        $query = 'UPDATE `event` SET `completed`= 1 WHERE event_id='.$_GET['event_id'];
    }
    $result=mysqli_query($con,$query);
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>