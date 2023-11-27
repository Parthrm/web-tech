<body>
    <!-- <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-black mt-10 flex">Today</h2> -->
    <section class="mt-10">
        <table id="TaskList" class="table-auto w-full text-left whitespace-no-wrap text-black display ">
            <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                        <div class="flex justify-between items-center">
                            Total Completed Tasks :
                            <?php echo $con->query('SELECT count(*) FROM `event` WHERE completed=1 AND user_id=18;')->fetch_row()[0]?>
                            <div>
                                <a href="..\Actions\addtask.php" class="border border-red p-1 rounded-lg hover:text-blue-500 hover:border-blue-500">
                                    Add task
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6 mb-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </a>
                                <a href="..\Actions\addcategory.php" class="border border-red p-1 rounded-lg ml-2 hover:text-blue-500 hover:border-blue-500">
                                    Add category
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6 mb-1 ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userid = $_SESSION['userid'];
                if (!isset($_SESSION['curcategory']) || $_SESSION['curcategory'] == -1) {
                    $sql = "SELECT * FROM `event` WHERE user_id=$userid";
                    $result = mysqli_query($con, $sql);
                } else {
                    $cat = $_SESSION['curcategory'];
                    $sql = "SELECT * FROM `event` WHERE user_id=$userid AND category_id=$cat";
                    $result = mysqli_query($con, $sql);
                }
                while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                <td class='px-4'>
                    <div class='flex flex-wrap '>
                      <div class=' event_box'>
                        <div class='";
                        if($row['completed']==true)
                            echo 'complete';
                        else
                            echo 'incomplete';
                      echo" event_box border flex flex-wrap justify-between group/event border-gray-500 bg-gray-100 p-6 rounded-lg shadow-md transition ease-out duration-300'>
                            <p hidden>" . $row['event_id'] . "</p>
                            <span>
                                <h2 class='text-xl text-black font-medium title-font mb-2 '>" . $row['event_name'] . "</h2>
                                <p class='leading-relaxed text-base text-[#6b7280]'>" . $row['event_description'] . "</p> ".'<button class="border-2 bg-gray-200" onclick="window.location.href=\'mark_as_complete.php?event_id='.$row['event_id'].'\'" > Marked ';
                                if($row['completed']==true)
                                echo 'complete✅ ';
                            else
                            echo 'incomplete ❌';
                        echo"</button></span>
                            <span class='transition invisible scale-0 duration-150 ease-in-out group-hover/event:visible group-hover/event:scale-100'>
                                <button id='edit' class='edits hover:text-blue-500 hover:bg-slate-200'>
                                    <span class='font-semibold'>Edit Event</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 '>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10' />
                                    </svg>
                                </button>                 
                                <button id='delete_event' class='delete ml-4 hover:text-red-500 hover:bg-slate-200'>
                                    <span class='font-semibold'>Delete</span>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6 '>
                                        <path stroke-linecap='round' stroke-linejoin='round' d='M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0' />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </td>
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

        <div hidden>
            <form action="..\Actions\edittask.php" method="post" id="edittaskform">
                <div class="relative mb-4">
                    <label for="user-name" class="leading-7 text-sm text-gray-100">Task id</label>
                    <input required type="text" id="edittaskid" name="edittaskid" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                </div>
                <div class="relative mb-4">
                    <label for="user-name" class="leading-7 text-sm text-gray-100">Task Name</label>
                    <input required type="text" id="edittaskname" name="edittaskname" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-100">Description</label>
                    <textarea required rows="5" id="edittaskdescription" name="edittaskdescription" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                

            </form>
            <form action="..\Actions\deletetask.php" method="post" id="deletetaskform">
                <div class="relative mb-4">
                    <!-- <label for="user-name" class="leading-7 text-sm text-gray-100">Task id</label> -->
                    <input required type="text" id="deletetaskid" name="deletetaskid" class="w-full bg-[#C147E9] rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                </div>
            </form>
        </div>
    </section>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<style>
    .complete{
        box-shadow: 10px 0px 0px #32CD32;
    }
    .complete:hover{
        box-shadow: 20px 10px 0px #32CD32;
    }
    .incomplete{
        box-shadow: 10px 0px 0px #C21807;
    }
    .incomplete:hover{
        box-shadow: 20px 10px 0px #C21807;
    }
    .event_box{
        width: 99%;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
    }
</style>

<script>
    const editButtons = document.querySelectorAll('.edits');
    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const clickedButtonText = event.target.textContent;
            e = event.target.parentNode.parentNode
            
            
            document.getElementsByName("edittaskid")[0].value = e.getElementsByTagName("p")[0].innerText;
            document.getElementsByName("edittaskname")[0].value = e.getElementsByTagName("h2")[0].innerText;
            document.getElementsByName("edittaskdescription")[0].value = e.getElementsByTagName("p")[1].innerText;

            document.getElementById("edittaskform").submit()

        });
    });

    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const clickedButtonText = event.target.textContent;
            e = event.target.parentNode.parentNode
            document.getElementsByName("deletetaskid")[0].value = e.getElementsByTagName("p")[0].innerText;

            let text;
            if (confirm("Press a button!") == true) {
                document.getElementById("deletetaskform").submit()

            }




        });
    });
</script>
</body>

</html>