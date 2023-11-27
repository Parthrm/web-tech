<?php
    require('..\required\dbconnect.php');
    $query = 'SELECT * FROM  `teamtask` WHERE task_id='.$_GET['task_id'];
    $row=mysqli_query($con,$query)->fetch_assoc();
    if($row['completed'])
    {
        $query = 'UPDATE `teamtask` SET `completed`= 0 WHERE task_id='.$_GET['task_id'];
    }
    else
    {
        $query = 'UPDATE `teamtask` SET `completed`= 1 WHERE task_id='.$_GET['task_id'];
    }
    $result=mysqli_query($con,$query);
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>