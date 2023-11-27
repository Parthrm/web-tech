<?php
require('..\required\dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // echo($_GET['teamid']);
    $_SESSION['eventid'] = $_GET['eventid'];
    $eventid = $_GET['eventid'];
}
// echo($eventid);
$sql = "SELECT * FROM `specialevents` JOIN user ON specialevents.userid=user.userid and specialevents.event_id=$eventid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$organiser_name = $row['username'];
$eventname = $row['event_name'];
$eventdes = $row['event_description'];
$eventdate = $row['event_date'];
$eventloc = $row['event_locdetails'];
$arr = [];
array_push($arr, $row['event_name'], $row['event_locdetails'], $row['lat'], $row['lon']);
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

<button onclick="history.back();" class="absolute top-[20px] left-[20px]" >Back</button>
    <section class="text-gray-600 body-font">

        <?php
        echo ('
    <div class="container px-5 py-24 mx-auto flex flex-col ">
    <div class="lg:w-4/6 mx-auto">
    <div class="bg-white bg-[url(\'../imgs/cover' . random_int(1, 8) . '.svg\')] h-48 bg-cover flex items-end border-2 rounded-lg border-black"> 
    <div class="flex justify-between w-full items-center" >
    <h1 class="sm:text-3xl text-2xl font-medium title-font text-black drop-shadow-2xl m-6">
    ' . $eventname . '
    </h1>');
        if (!isset($row['user_id'])) {

            echo "<button class='bn632-hover bn26' onclick='enroll();'>Enroll</button>";
        } else {
            echo "<span class=''>Already Enrolled</span>";
        }
        echo ('</div></div>

      <div class="flex flex-col sm:flex-row mt-10 mb-10 border-2 rounded-lg border-black">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex flex-col items-center text-center justify-center ">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Organiser</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">' . $organiser_name . '</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
        <span class="font-medium title-font mt-4 text-gray-900 text-lg">Description</span>
          <p class="leading-relaxed text-lg mb-4">' . $eventdes . '</p>
        </div>
      </div>
      <div class="border-2 rounded-lg border-black h-96 overflow-hidden" id="map">
        </div>
    </div>
  </div>
  ')
        ?>
    </section>
    <section class="text-gray-600 body-font">
    </section>
    <div class="flex justify-center mb-48">
        <?php
        $sql = "SELECT * FROM `enrollment` WHERE event_id=$eventid and user_id=" . $_SESSION['userid'];
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
    </div>

    <style>
        .bn632-hover {
            width: 80px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            margin: 10px;
            height: 45px;
            text-align: center;
            border: none;
            background-size: 300% 100%;
            border-radius: 50px;
            -o-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .bn632-hover:hover {
            background-position: 100% 0;
            moz-transition: all .4s ease-in-out;
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .bn632-hover:focus {
            outline: none;
        }

        .bn632-hover.bn26 {
            background-image: linear-gradient(to right,
                    #25aae1,
                    #4481eb,
                    #04befe,
                    #3f86ed);
            box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
        }
    </style>

    <script>
        function enroll() {
            if (confirm('Do you want to enroll in this event?')) {
                window.location.href = "../Events/enroll.php";
            }
        }
    </script>

</body>

</html>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- <div id="map" style="height: 100%;width: 100%;"></div> -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


<script>
    var mapentries = [<?php
                        foreach ($arr as $val) {
                            echo json_encode($val);
                            echo (",");
                        }
                        ?>]

    console.log(mapentries);

    var latitude = mapentries[2],
        longitude = mapentries[3];
    var eventname = mapentries[0],
        locname = mapentries[1];

    var map = L.map('map').setView([latitude, longitude], 15);



    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);



    // var searchControl = L.Control.geocoder({
    //     defaultMarkGeocode: false
    // }).on('markgeocode', function(e) {
    //     var latlng = e.geocode.center;
    //     map.setView(latlng, 15);

    //     // Use latlng (latitude and longitude) as needed, e.g., store in a form field
    //     // console.log('Latitude: ' + latlng.lat + ', Longitude: ' + latlng.lng);
    // }).addTo(map);





    marker = L.marker([latitude, longitude]).addTo(map)
        .bindPopup(`<b>${eventname}</b><br><div class=" ">${locname}</div>`)
        .openPopup();
</script>