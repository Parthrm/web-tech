<!-- php part  -->
<?php
    require('..\..\required\dbconnect.php');

 
    $user_exist=true;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      
     
        $_SESSION['email']=$_POST['email'];
       
        
     
        $checkemail=$_POST['email'];
        $sql="SELECT * FROM `user` WHERE email='$checkemail' ";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
          // otp generation
          $_SESSION['otp']=rand(111111,999999);
          require '..\mailer.php';
          
          header("location: otpverification.php");
        }
        else{
          $user_exist=false;
          echo('user doesnt exist');
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
<body class="bg-[#01BAEF]">

<!-- signup -->
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  ">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
      <h1 class="title-font font-large sm:text-center text-5xl text-gray-100">Event Horizon</h1>
    </div>

    <div class="shadow-2xl lg:w-2/6 md:w-1/2 bg-[#0B4F6C] rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-white text-lg font-medium title-font mb-5">Enter your email</h2>
        
      <form  action="sendotp.php" method="post">
        
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-100">Email</label>
            <input required type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-gray-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        <div class="md:w-2/3 mb-10">
        <button class="shadow bg-[#0ea5e9] hover:bg-[#0ea5ff] focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Send OTP
        </button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>