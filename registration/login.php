<!-- php part  -->
<?php
require('..\required\dbconnect.php');
session_abort();
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $exists = false;



    $sql = "SELECT * FROM `user` WHERE username='$username' ";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedpass = $row['password'];
        if (password_verify($password, $hashedpass)) {
            echo "works";

            $_SESSION['userid'] = $row['userid'];
            echo $_SESSION['userid'];
            // echo"logged in";
            header("location: ..\home\homepage.php");
        } else {
            echo 'Invalid password.';
            // $_SESSION['userid']=13;
            // header("location: ..\home\homepage.php");
        }

        //echo"             loggedin";
        //header("location: welcome.php");

    } else {
        echo "invalid";
    }
}


?>






<!-- html part  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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

<body class="bg-[#01BAEF]">
    <!-- signup -->
    <section class="text-gray-600 body-font lg:w-3/4 lg:mx-40 my-20 ">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16  lg:pr-0 pr-0">
                
                <h1 class="title-font font-large sm:text-center text-5xl text-gray-100 flex justify-center items-center">
                    <svg style="background-color: #0B4F6C;width: 60px;height: 60px;padding: 10px;border-radius: 35px;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span id="eh" class="drop-shadow-lg" >
                        Event Horizon
                    </span>
                </h1>
            </div>

            <div class="shadow-2xl lg:w-2/6 md:w-1/2 bg-[#0B4F6C] rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <h2 class="text-white text-lg font-medium title-font mb-5">Login</h2>

                <form action="login.php" method="post">
                    <div class="relative mb-4">
                        <label for="user-name" class="leading-7 text-sm text-gray-100">User Name</label>
                        <input required type="text" id="full-name" name="username" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="password" class="leading-7 text-sm text-gray-100">Password</label>
                        <input required type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 hover:bg-[#dfdfdfe5] focus:border-[#1d4ed8] focus:bg-[#dfdfdfe5]: focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="flex flex-wrap mx-auto  items-center">
                        <button class="text-black bg-[#0ea5e9] border-0 py-2 px-8 focus:outline-none hover:bg-sky-300 rounded text-lg ">Login</button>
                    </div>
                    <a class="text-white" href="forgotpassword\sendotp.php">Forgot Password?</a>

                </form>
            </div>
        </div>
    </section>
</body>

</html>