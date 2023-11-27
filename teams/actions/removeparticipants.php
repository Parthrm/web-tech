<!-- php part  -->


<?php
    require('..\..\required\dbconnect.php');
    echo("helo");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check if any checkboxes are checked
      if(isset($_POST['checkbox_name'])){
          // Loop through the checked checkboxes
          $teamid=$_SESSION['teamid'];
          foreach ($_POST['checkbox_name'] as $selectedCheckbox) {
              echo "Checked: " . $selectedCheckbox . "<br>";
              $sql="DELETE FROM `teammembers` WHERE team_id=$teamid AND user_id=$selectedCheckbox";
              $result=mysqli_query($con,$sql); 
          }
      } else {
          echo "No checkboxes are checked.";
      }
      header('location: ../teamview.php?teamid='.$_SESSION['teamid']);
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
    

    <div class=" bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 shadow-lg  ">
      <h2 class="text-black text-lg text-center font-medium title-font mb-5">Remove Participants</h2>
        


<section>


    
<?php 
    require('removepartitables.php');
?>

</section>
        

        

      </form>  
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script> -->
    <script src="tasktablecss.js"></script>
    <script>

      let table = new DataTable('#TaskList');
    </script>
    
</body>
</html>