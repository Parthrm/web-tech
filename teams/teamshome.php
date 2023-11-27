<?php
  require('..\required\dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
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
<body class="bg-gray-100">
<header class="text-gray-600 body-font sticky top-0">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-blue-300">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg style="background-color: #0B4F6C;width: 60px;height: 60px;padding: 10px;border-radius: 35px;" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span id="eh">Event Horizon</span>
      <p class="ml-2">/ My Tasks</p>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a href="../Home/homepage.php" class="mr-5 hover:text-gray-900">My Tasks</a>
      <a href="../teams/teamshome.php" class="mr-5 hover:text-gray-900">Teams</a>
      <a href="../Events/eventshome.php" class="mr-5 hover:text-gray-900">Special Events</a>
      <a href="../registration/login.php"  class="mr-5 hover:text-gray-900">Logout</a>
      
    </nav>
    
  </div>

</header>

<section class="text-gray-600 body-font">

  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Teams</h1>
      <button onclick="window.location.href='actions/createteam.php';" >Create Team</button>
    </div>
    <div class="flex flex-wrap -m-2">
      
    
    <?php
        $userid=$_SESSION['userid'];
        $sql="SELECT * FROM `teammembers` WHERE user_id=$userid";
        $result=mysqli_query($con,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            $teamid=$row['team_id'];
            $sql="SELECT * FROM `teams` WHERE team_id=$teamid";
            $resultname=mysqli_query($con,$sql);
            $rowname=mysqli_fetch_assoc($resultname);
            $teamname=$rowname['team_name'];

            $sql="SELECT * FROM `teamadmin` WHERE team_id=$teamid";
            $resultname=mysqli_query($con,$sql);
            $rowadmin=mysqli_fetch_assoc($resultname);
            $adminid=$rowadmin['user_id'];
            $sql="SELECT * FROM `user` WHERE userid=$adminid";
            $resultname=mysqli_query($con,$sql);
            $rowname=mysqli_fetch_assoc($resultname);
            $adminname=$rowname['username'];
            echo('
            
            <div class="p-4 lg:w-1/3 md:w-1/2 w-full">
            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-gray-100">
              <div class="flex-grow">
              <a href="teamview.php?teamid='.$teamid.'">
                <h2 class="text-gray-900 title-font font-medium">
                <p hidden>'.$teamid.'</p>
                '.$teamname.'
                </h2>
                </a>
                <p class="text-gray-500">Admin: '.$adminname.'</p>
              </div>
            </div>
          </div>
        
            ');
        }
    ?>

</section>
</body>
</html>