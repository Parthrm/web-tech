<!-- php part  -->
<?php
    require('..\required\dbconnect.php');
    $password_match=true;
    $user_exist=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['password']==$_POST['confirmpassword']){
       
        $_SESSION['username']=$_POST['username'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);
        
       
        //checking if the username or email is already in use 
        $checkuser=$_POST['username'];
        $checkemail=$_POST['email'];
        $sql="SELECT * FROM `user` WHERE username='$checkuser' OR email='$checkemail' ";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num==0){
          // otp generation
          $_SESSION['otp']=rand(111111,999999);
          require 'mailer.php';
          header("location: otpverification.php");
        }
        else{
          $user_exist=true;
        }
       
      }
      else{
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
<body class="bg-[#01BAEF]">
<style>
#eh{
    font-family: title;
    font-size: large;
    margin-left: 10px;
}
@font-face {
    font-family: title;
    src: url("../resources/Beyonders-6YoJM.ttf");
}
</style>
<!-- signup -->
<section class="text-gray-600 body-font lg:w-3/4 lg:mx-40  ">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
    <h1 class="title-font font-large sm:text-center text-5xl text-gray-100 flex justify-center items-center">
                    <svg style="background-color: #0B4F6C;width: 60px;height: 60px;padding: 10px;border-radius: 35px;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span id="eh">
                        Event Horizon
                    </span>
                </h1>
    </div>

    <div class="lg:w-2/6 md:w-1/2 bg-[#0B4F6C] rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 ">
      <h2 class="text-white text-lg font-medium title-font mb-5">Sign Up</h2>
        <?php
          if($user_exist){
            echo('<p class="text-red-500">Username or Email is already taken</p>');
          }
        ?>
      <form  action="signup.php" method="post">
        <div class="relative mb-4">
            <label for="user-name" class="leading-7 text-sm text-gray-100">User Name</label>
            <input required type="text" id="full-name" name="username" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
          </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-100">Email</label>
            <input required type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-100">Password</label>
            <input required type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="confirm-password" class="leading-7 text-sm text-gray-100">Confirm Password</label>
            <input required type="password" id="confirmpassword" name="confirmpassword" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php
              if(!$password_match){
                echo('<p class="text-red-500">Password doesnt match</p>');
              }
            ?>
            
          </div>
        <div class="flex flex-wrap mx-auto  items-center">
        <button onclick="return validatePassword();" class="text-black bg-[#0ea5e9] border-0 py-2 px-8 focus:outline-none hover:bg-sky-300 rounded text-lg ">Signup</button>
        </div>
        <a class="text-white" href="login.php">Already have an account?</a>

      </form>  
    </div>
  </div>
</section>
    
</body>
</html>

<script>
  function validatePassword() {
    var password = document.getElementById('password').value;
    // var validationMessage = document.getElementById('validationMessage');

    // Minimum length of 8 characters
    if (password.length < 8) {
      // validationMessage.textContent = 'Password must be at least 8 characters long.';
      alert('Password Length Less Then 8 characters');
      return false;
    }

    // Check for at least one letter and one number
    var letterRegex = /[a-zA-Z]/;
    var numberRegex = /\d/;

    // if (!letterRegex.test(password) || !numberRegex.test(password)) {
    //   // validationMessage.textContent = 'Password must contain at least one letter and one number.';
    //   alert('Password Length Less Then 8 characters');
    //   return false;
    // }

    return true;
  }
</script>