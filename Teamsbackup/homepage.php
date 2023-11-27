<?php
  require('..\required\dbconnect.php');

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="tablecss.css"> -->
    
    
</head>
<body class="bg-gray-100">
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-blue-300">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Tailblocks</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900">My Tasks</a>
      <a class="mr-5 hover:text-gray-900">Teams</a>
      <a class="mr-5 hover:text-gray-900">Special Events</a>
      
    </nav>
    
  </div>

</header>

<section>
  
</section>

<section class="text-gray-600 body-font">


  <div class="container  flex   flex-row ">
  
    <?php
      require("Teams.php");
    ?>
    <div class=" w-full  flex-col items-center mx-20">
    <!-- <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Today</h2> -->
    <p class=""></p>
    <?php
      require("tables.php");
    ?>
    </div>
  </div>
</section>
    <!-- table -->
    
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script> -->
    <script src="tasktablecss.js"></script>
    <script>

      let table = new DataTable('#TaskList');
    </script>
    
</body>
</html>

<!-- https://code.jquery.com/jquery-3.7.0.js
https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js -->
