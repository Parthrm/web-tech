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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    
</head>
<body>
    <!-- table -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Events</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
          </div>
          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table id="TaskList" class="table-auto w-full text-left whitespace-no-wrap my-6 ">
              <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">User Id</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Category ID</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Event Name</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Event Description</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $sql="SELECT * FROM `event` WHERE 1";
                  $result=mysqli_query($con,$sql);
                  while($row=mysqli_fetch_assoc($result)){
                    
                    echo"
                    <tr>
                    <td class='px-4 py-3'>".$row['event_id']."</td>
                    <td class='px-4 py-3'>".$row['category_id']."</td>
                    <td class='px-4 py-3'>".$row['event_name']."</td>
                    <td class='px-4 py-3 text-lg text-gray-900'>".$row['event_description']."</td>
                    
                    </tr>
                    ";
                  }
                ?>
               
              </tbody>
            </table>
          </div>
          
      </section>
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>

      let table = new DataTable('#TaskList');
    </script>
    
</body>
</html>