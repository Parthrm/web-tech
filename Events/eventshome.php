<?php
    if(!isset($_GET['explore']))
    {
        header('../Events/eventshome.php?explore=1');   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    #eh {
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
    <header class="text-gray-600 body-font sticky top-0 z-10">
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
                <!-- <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Create
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M12 2v20M2 12h20"></path>
                    </svg>
                </button> -->
                
            </nav>
            
        </div>
        
    </header>
    <div class="mt-8 ml-8 " >
        <button class="bg-gray-200 p-2 rounded-lg" onclick="window.location.href='eventshome.php?explore=0'" >My Events</button>
        <button class="bg-gray-200 p-2 rounded-lg" onclick="window.location.href='eventshome.php?explore=1'" >Explore</button>
        <a href="../Events/actions/createevent.php" class="border border-red p-1 rounded-lg hover:text-blue-500 hover:border-blue-500">
                                    Create Event
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6 mb-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </a>
    </div>
    <div class="flex flex-wrap mt-20 z-1" >

        <?php
        if(!isset($_GET['explore'])|| $_GET['explore']==0)
        {
            require("myevents_myevents.php");
            
        }
        else{
            require("myevents_explore.php");
        }
       
        
    ?>
    </div>
</body>

</html>