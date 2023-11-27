<?php
    require('..\required\dbconnect.php');
    
    $password_match=true;
    $user_exist=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      
       
        
        // $userid=$_SESSION['userid'];
        $userid=$_SESSION['userid'];
        $message=$con ->real_escape_string($_POST['message']);
        $msgtime=date('Y-m-d H:i:s');
        echo($msgtime);

        $sql="INSERT INTO `teammessages`(`team_id`, `user_id`, `message`) VALUES ('1','$userid','$message')";
        $result=mysqli_query($con,$sql);
        header("location: chatproto.php");
        echo"task enterd";
        
      }
      
    
?>