<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $_SESSION['curcategory']=$_POST['category'];
        $userid=$_SESSION['userid'];
        
        if(isset($_POST['category'])){
            if(isset($_POST['allcategory'])){
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

<div class="w-1/4 h-80 bg-white  text-black  flex flex-col h-screen shadow-lg overflow-auto">
    <div class="  mb-6   text-center mt-4 ">
          <span class="font-semibold title-font">CATEGORY</span>
    </div>
    <div class="overflow-y-auto mx-auto">
    <form action="" method="post" id="categoryform" class="mx-auto ">
    <input type="submit" class="px-2 bg-gray-200 h-10 rounded-md mt-[10px] hover:bg-gray-400 justify-between px-4 w-52 transition duration-300 ease-in-out" name="allcategory" value="All Events">
    <?php
        $userid=$_SESSION['userid'];
        $sql="SELECT * FROM `category` WHERE user_id=$userid";
        $result=mysqli_query($con,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            $categoryname=$row['category_name'];
                echo"
                <div class='flex bg-gray-200 group/category rounded-md mt-[10px] hover:bg-gray-400 justify-start px-4 w-52 transition duration-300 ease-in-out group-hover/category:justify-between'>
                <label class='my-2'>
                <input type='radio' name='category'class='hidden peer' value='$categoryname'>
                <p class='cat text-ellipsis overflow-hidden  w-28'>$categoryname</p>
                </label>
                <button type='button' class='deletecat ml-6 hover:bg-red-500 w-24 transition duration-300 ease-in-out invisible scale-0 group-hover/category:visible group-hover/category:scale-100'>
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
