<!-- php part  -->
<?php
    require('..\required\dbconnect.php');
    
    $password_match=true;
    $user_exist=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      
       
        
        $userid=$_SESSION['userid'];
        $taskname=$_POST['taskname'];
        $taskdescription=$_POST['taskdescription'];
        $taskcategory=$_POST['categoryname'];
        
        

        $sql="INSERT INTO `event`(`category_id`, `user_id`, `event_name`, `event_description`) VALUES ('$taskcategory','$userid','$taskname','$taskdescription')";
        $result=mysqli_query($con,$sql);
        header("location: ..\Home\homepage.php");
        echo"task enterd";
       
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
<body class="bg-gray-100">

<!-- signup -->
<section class="text-gray-600 body-font  w-3/4 mx-auto pt-20 ">
  <div class="container   mx-auto flex flex-wrap items-center">
    

    <div class=" bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 shadow-lg  ">
      <h2 class="text-black text-lg text-center font-medium title-font mb-5">Add Task</h2>
        
      <form  action="addtask.php" method="post">
        <div class="relative mb-4">
            <label for="user-name" class="leading-7 text-sm text-black">Task Name</label>
            <input required type="text" id="taskname" name="taskname" class="w-full bg-gray-200 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
          </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-black">Description</label>
            <textarea required rows="5"  id="taskdescription" name="taskdescription" class="w-full bg-gray-200 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
        </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-black">Category</label>
            <select id="cars" name='categoryname' value="health" class="bg-blue-100 border border-black">
            <?php
            // PHP code to generate options dynamically
            $userid=$_SESSION['userid'];
            $sql="SELECT * FROM `category` WHERE user_id=$userid";
            $result=mysqli_query($con,$sql);
            echo "<option value='-1' >No Category</option>";
            while($row=mysqli_fetch_assoc($result)) {
            $categoryname=$row['category_name'];
            $categoryid=$row['category_id'];
            echo "<option value='$categoryid' >$categoryname</option>";
            }
            
            ?>
            </select>
        </div>
        
        
        <div class="  ">
        <button class="mx-auto  text-black bg-blue-200 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg ">ADD</button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>