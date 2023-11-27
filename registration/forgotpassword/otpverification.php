<?php
    $invalidotp=false;
    require('..\..\required\dbconnect.php');
    // echo($_SESSION['otp']);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        echo($_POST['userotp']);
        
        echo($_POST['userotp']==$_SESSION['otp']);
        
        if($_POST['userotp']==$_SESSION['otp']){
            
                header("location: updatepassword.php");
            
        }
        else{
            echo"Invalid OTP";
            $invalidotp=true;
        }
        

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-[#01BAEF]">
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  mt-32 ">
  

    <div class="lg:w-2/6 md:w-1/2 bg-[#0B4F6C] shadow-2xl rounded-lg p-8 flex flex-col mx-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-white text-lg font-medium title-font mb-5">OTP verification</h2>
      <form  action="otpverification.php" method="post">
        <div class="relative mb-4">
            <label for="userotp" class="leading-7 text-sm text-gray-100">Enter OTP</label>
            <input type="text" id="userotp" name="userotp" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        
        <div class="flex flex-wrap mx-auto  items-center">
        <button class="text-black bg-[#0ea5e9] border-0 py-2 px-8 focus:outline-none hover:bg-[#0ebaff] rounded text-lg ">Verify</button>
        </div>
        

      </form>  
    </div>
  </div>
</section>
</body>
</html>
