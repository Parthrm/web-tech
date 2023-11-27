


<body>

<section>
<form action="removeparticipants.php" method="post">

    

<table id="TaskList" class="table-auto w-full text-left whitespace-no-wrap text-black display ">
  
              <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                  
                  <div class="flex justify-between items-center">
                    Username
                  </div>
                  </th>
                  </tr>
              </thead>
              <tbody>
               
                <?php
                  $teamid=$_SESSION['teamid'];
                  
                  $sql="SELECT * FROM `teammembers` WHERE team_id=$teamid";
                  $result=mysqli_query($con,$sql);

                  //$userid=$row['userid'];
                   
                  
                  while($row=mysqli_fetch_assoc($result)){
                    $userid=$row['user_id'];
                    $sql="SELECT * FROM `user` WHERE userid=$userid";
                    $resultname=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($resultname);
                    $username=$row['username'];
                    echo"
                    <tr>
                    <td class='px-4 '>
                    <div class='flex flex-wrap  '>
                      <div class='w-full '>
                        <div class=' flex border border-gray-500 bg-gray-100 p-2 rounded-lg shadow-md hover:scale-105 transition ease-out duration-150'>
                        <p hidden>".$row['userid']."</p>
                        

                        <input type='checkbox' class='w-4 h-4 mt-2' name='checkbox_name[]' value='".$row['userid']."'>
                          <p class='text-xl text-black font-medium title-font ml-2'>".$row['username']."</p>

                          
                          
                        </div>
                    </div>
                    </td>
                    
                    </tr>
                    ";
                   
                    
                  }
                ?>
               
              </tbody>
            </table>
            <div class="  ">
        <button type="submit" class="mx-auto  text-black bg-red-200 border-0 py-2 px-8 focus:outline-none hover:bg-red-500 rounded text-lg ">REMOVE</button>
        </div>
        
        </form>
</section>



</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    

<script>
        
       
                

                

       
    </script>
</body>
</html>
