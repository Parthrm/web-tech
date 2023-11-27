


<!-- php part  -->
<?php
    require('..\..\required\dbconnect.php');
    
    if(isset($_POST['edittaskid'])){
    $_SESSION['edittaskid']=$_POST['edittaskid'];
    $edittaskid=$_SESSION['edittaskid'];
    $userid=$_SESSION['userid'];
    $sql="SELECT * FROM `teamtask` WHERE task_id=$edittaskid";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $edittaskname=$row['task_name'];
    $edittaskdescription=$row['task_description'];
    
    }
    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['editedtaskname'])){
      
       
        $edittaskid=$_SESSION['edittaskid'];
        $userid=$_SESSION['userid'];
        
        $taskname=$_POST['editedtaskname'];
        $taskdescription=$_POST['editedtaskdescription'];
        
       
        $sql="UPDATE `teamtask` SET `task_name`='$taskname',`task_description`='$taskdescription' WHERE task_id=$edittaskid";
        $result=mysqli_query($con,$sql);
        header('location: ../teamview.php?teamid='.$_SESSION['teamid']);
        echo"task updated";
       
      }
      
      
?>






<!-- html part  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<!-- signup -->
<section class="text-gray-600 body-font  w-3/4 mx-auto pt-20 ">
  <div class="container   mx-auto flex flex-wrap items-center">
    

    <div class=" bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 shadow-lg">
      <h2 class="text-black text-lg text-center font-medium title-font mb-5">Update Task</h2>
       <?php
        echo('
        <form  action="edittask.php" method="post">
        <div class="relative mb-4">
            <label for="user-name" class="leading-7 text-sm text-black">Task Name</label>
           <textarea  required rows="1"  id="taskdescription" name="editedtaskname" class="w-full bg-gray-200 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">'.$edittaskname.'</textarea>
        
          </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-black">Description</label>
            <textarea  required rows="5"  id="taskdescription" name="editedtaskdescription" class="w-full bg-gray-200 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">'.$edittaskdescription.'</textarea>
        </div>
       
        
        <div class="  ">
        <button class="mx-auto  text-black bg-blue-200 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg  " >UPDATE</button>
        </div>
        

      </form> 
        ');
       ?>
    </div>
  </div>
</section>
    
</body>
</html>