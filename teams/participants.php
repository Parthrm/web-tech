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
        header("location: ../teamview.php");
    }
    else{

    }
?>





<div class="w-1/4 h-80 bg-white  text-black  flex flex-col h-screen ">
    <div class="  mb-6   text-center mt-4 mx-auto">
          <span class="font-semibold title-font     ">PARTICIPANTS</span>
          
        </div>
    <div class="overflow-y-auto  mx-auto">
    <form action="" method="post" id="teamform" class="mx-auto ">
    <!-- <input type="submit" class="px-2" name="allteams" value="ALL"> -->
    <div class="my-4 ">
                  <a href="actions\addparticipants.php" class=" border border-gray-200 p-1 rounded-lg hover:text-green-500 hover:border-green-500">
                      Add 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6 mb-1 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    </a>  
                    <a href="actions\removeparticipants.php" class="w-1/2 border border-gray-200 p-1 rounded-lg hover:text-red-500 hover:border-red-500">
                      Remove
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6 mb-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </a>  
                    
                  </div>

    <?php
        $teamid=$_SESSION['teamid'];
        $sql="SELECT * FROM `teammembers` WHERE team_id=$teamid";
        $result=mysqli_query($con,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            $userid=$row['user_id'];
            $sql="SELECT * FROM `user` WHERE userid=$userid";
            $resultname=mysqli_query($con,$sql);
            $rowname=mysqli_fetch_assoc($resultname);
            $username=$rowname['username'];
                echo"
                <div class='flex my-1 border border-gray-200 p-1'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='mt-2 w-6 h-6'>
  <path stroke-linecap='round' stroke-linejoin='round' d='M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z'/>
</svg>
                <label class='py-2  ml-2'>
                

                <p class='inline'>$username</p>
                </label>
                
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


<!-- <button type='button' class='deletecat ml-6'>
                <p class='font-bold '>X</p>
                </button>   -->


<script>
    // JavaScript code to handle radio button change event
   

</script>
