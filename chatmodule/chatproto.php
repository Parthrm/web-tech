

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 bg-[url('../resources/chatbg.svg')] bg-cover" onload="gobottom()">

<header class="text-white body-font bg-blue-400 w-full fixed ">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      
      <?php
      require('..\required\dbconnect.php');
      $teamid=$_SESSION['teamid'];
      $sql="SELECT * FROM `teams` WHERE team_id=$teamid";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($result);
      echo('<a href="../teams/teamview.php?teamid='.$teamid.'">Back</a>');
      echo("<span class='ml-3 text-xl'>".$row['team_name']."</span>");
      ?>
    </a>
    
  </div>
</header>


<section class="text-black body-font pt-20 pb-40 w-3/4 mx-auto  ">
    
  <?php
    
    $teamid=$_SESSION['teamid'];
    $sql="SELECT * FROM `teammessages` WHERE team_id=$teamid";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $curchat=$row['user_id'];
        $sql="SELECT * FROM `user` WHERE userid='$curchat'";
        $resultuser=mysqli_query($con,$sql);
        $rowuser=mysqli_fetch_assoc($resultuser);
        if($row['user_id']!=$_SESSION['user_id']){
            echo('<div class=" items-center border-gray-200 border my-4 rounded-tl-lg rounded-tr-lg rounded-br-lg w-1/2 bg-blue-400 shadow-2xl">
            <div class="overflow-x-hidden p-4">
            <h2 class=" title-font font-medium mb-1">'.$rowuser['username'].'</h2>
            <p class="">'.$row['message'].'</p>
            </div> 
            <div class="mr-[80%] text-xs text-gray-900">
                <p class="text-s ">'.$row['msgtime'].'</p>
            </div>
            </div>
            ');
        }
        else{
            echo('<div class=" items-center border-gray-200 border  my-4  rounded-tl-lg rounded-tr-lg rounded-bl-lg w-1/2 ml-auto bg-blue-400 shadow-2xl">
            <div class="overflow-x-hidden p-4 ">
            <h2 class=" title-font font-medium mb-1">'.$rowuser['username'].'</h2>
            <p class="">'.$row['message'].'</p>
            
            
            </div> 
            <div class="ml-[80%] text-xs text-gray-900">
                <p class="text-s ">'.$row['msgtime'].'</p>
            </div>
            </div>
            ');
        }
    }
  ?>


        
</section>

<div class="p-2 lg:w-1/3 md:w-1/2 w-full">






<div class="fixed bottom-0 w-full bg-gray-300 rounded-lg ">
<form action="sendmsg.php" method="post">
<div class="container px-5 py-5"> 
    <textarea name="message" rows="1"  class="resize-none ml-20 w-5/6 bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white/70 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
    <button type="submit" class="text-white bg-blue-400 border-0  py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg">Send</button>
</div>
</form> 
</div>
    
</body>
</html>
<script>
  function gobottom()
  {
    window.scrollTo(0, document.body.scrollHeight);
  }

</script>