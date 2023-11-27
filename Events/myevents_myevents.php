<?php
require('..\required\dbconnect.php');

$userid = $_SESSION['userid'];
$sql = "SELECT * FROM `specialevents` WHERE userid=".$_SESSION['userid'];
$result = mysqli_query($con, $sql);


while ($row = mysqli_fetch_assoc($result)) {
  $eventid = $row['event_id'];
  $eventname = $row['event_name'];
  $eventdes = $row['event_description'];
  echo ('
      <div class="mx-auto h-fit mb-10">
        <div class="event flex items-center lg:w-fit mx-auto border-4  border-gray-200 sm:flex-row flex-col border border-gray-500 bg-transparent rounded-lg p-6">
          <div class="shadow-lg overflow-hidden sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full flex-shrink-0 bg-cover bg-gray-200 bg-[url(\'../imgs/cover' . random_int(1, 5) . '.svg\')]">
          </div>
          <div class="flex-grow sm:text-left w-32 h-60 text-center mt-6 sm:mt-0">
            <h2 class="event_name text-gray-900 text-lg title-font font-medium mb-2">' . $eventname . '</h2>
            <p class="leading-relaxed text-base h-32 text-ellipsis overflow-hidden">' . $eventdes . '</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center" href="eventview.php?eventid=' . $eventid . '">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      
  
      ');
}
?>
<style>
  .event {
    color: #000;
    position: relative;
    text-decoration: none;
  }

  .event::before {
    background: #9ca3af;
    content: "";
    inset: 0;
    position: absolute;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.18s ease-in-out;
    z-index: -1;
  }

  .event:hover::before {
    transform: scaleX(1);
    transform-origin: left;
  }
</style>
<!-- <section class="text-gray-600 body-font">

    <button class="flex mx-auto mt-20 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
    </div>
</section> -->