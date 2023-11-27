<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $_SESSION['curcategory']=$_POST['category'];
        $userid=$_SESSION['userid'];
        
        if(isset($_POST['team'])){
            if(isset($_POST['allteams'])){
                $_SESSION['curcategory']=-1;
            }
            else{
                $categoryname=$_POST['category'];
                $sql="SELECT category_id FROM `category` WHERE user_id=$userid AND category_name='$categoryname'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $_SESSION['curcategory']=$row['category_id'];
            }
        }
    }
    else{

    }
?>





<div class="w-1/4 h-80 bg-white  text-black  flex flex-col h-screen ">
    <div class="  mb-6   text-center mt-4 ">
          <span class="font-semibold title-font     ">TEAMS</span>
          
        </div>
    <div class="overflow-y-auto  mx-auto">
    <form action="" method="post" id="teamform" class="mx-auto ">
    <!-- <input type="submit" class="px-2" name="allteams" value="ALL"> -->
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
                echo"
                <div class='flex'>
                <label class='my-2  '>
                <input type='radio' name='team'class='hidden peer ' value='$teamname'>
                <p class='cat'>$teamname</p>
                </label>
                <button type='button' class='deletecat ml-6'>
                <p class='font-bold '>X</p>
                </button>  
                </div>
                ";
            
            
        }  
    



    ?>
    </form>
    </div>

    <form action="..\Actions\deletecategory.php" method="post" id="deletecatform">
  <div class="relative mb-4 hidden ">
            <!-- <label for="user-name" class="leading-7 text-sm text-gray-100">Task id</label> -->
            <input required type="text" id="deletecategoryid" name="deletecategoryid" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
  </div>
  </form>
    
    
</div>


<script>
    // JavaScript code to handle radio button change event
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    // const selectedCarDisplay = document.getElementById('selectedCar');

    radioButtons.forEach(radioButton => {
        radioButton.addEventListener('change', function() {
            // selectedCarDisplay.textContent = this.value;
            document.getElementById("categoryform").submit() 
        });
    });

    const catdeleteButtons = document.querySelectorAll('.deletecat');

        catdeleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                const clickedButtonText = event.target.textContent;
                e=event.target.parentNode.parentNode
                
                
                
                document.getElementsByName("deletecategoryid")[0].value=e.getElementsByClassName("cat")[0].innerText;
                
                
          if (confirm("All Tasks in this category will be deleted!") == true) {
                document.getElementById("deletecatform").submit()

              }
                

                

            });
        });
</script>
