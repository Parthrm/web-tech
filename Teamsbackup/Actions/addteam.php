<!-- php part  -->
<?php
    require('..\required\dbconnect.php');
    
   
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      
       
        
        $userid=$_SESSION['userid'];
        $categoryname=$_POST['categoryname'];
        



        $sql="INSERT INTO `category`(`user_id`, `category_name`) VALUES ('$userid','$categoryname')";
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
    

    <div class=" bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0  shadow-lg">
      <h2 class="text-black text-lg text-center font-medium title-font mb-5">Add Category</h2>
      
      <form  action="addcategory.php" method="post">
        <div class="relative mb-4">
            <label for="user-name" class="leading-7 text-sm text-black">Category Name</label>
            <input required type="text" id="categoryname" name="categoryname" class="w-full bg-gray-200 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
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