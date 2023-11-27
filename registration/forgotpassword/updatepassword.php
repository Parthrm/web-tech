<!-- php part  -->
<?php
    require('..\..\required\dbconnect.php');

    $password_match=true;
    $user_exist=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['password']==$_POST['confirmpassword']){
       
        
        $newpassword=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fpemail=$_SESSION['email'];
        //checking if the username or email is already in use 
        
        $sql="UPDATE user SET password = '$newpassword' WHERE email = '$fpemail';";
        $result=mysqli_query($con,$sql);
        
        header("location: ..\login.php");
       
      }
      else{
        echo "password problem";
        $password_match=false;
        
      }
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
<body class="bg-[#2D033B]">

<!-- signup -->
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  ">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
      <h1 class="title-font font-large sm:text-center text-5xl text-gray-100">Event Horizon</h1>
    </div>

    <div class="lg:w-2/6 md:w-1/2 bg-[#810CA8] rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-purple-300 text-lg font-medium title-font mb-5">Enter new password</h2>
        
      <form  action="updatepassword.php" method="post">
        
        
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-100">Password</label>
            <input required type="password" id="password" name="password" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="confirm-password" class="leading-7 text-sm text-gray-100">Confirm Password</label>
            <input required type="password" id="confirmpassword" name="confirmpassword" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php
              if(!$password_match){
                echo('<p class="text-red-500">Password doesnt match</p>');
              }
            ?>
            
          </div>
        <div class="flex flex-wrap mx-auto  items-center">
        <button class="text-black bg-[#E5B8F4] border-0 py-2 px-8 focus:outline-none hover:bg-purple-500 rounded text-lg ">Update</button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>