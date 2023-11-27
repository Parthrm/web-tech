<!-- php part  -->
<?php
    require('..\..\required\dbconnect.php');
    
    $password_match=true;
    $user_exist=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
      
       
        
        $userid=$_SESSION['userid'];
        // $userid=;
        $eventname=$_POST['eventname'];
        $eventdate=$_POST['eventdate'];
        $eventdescription=$_POST['eventdescription'];
        $locdetails=$_POST['locationdetails'];
        $lat=$_POST['lat'];
        $lon=$_POST['lon'];
        

        $sql="INSERT INTO `specialevents`(`userid`, `event_name`,`event_date`, `event_description`, `event_locdetails`, `lat`, `lon`) VALUES ('$userid','$eventname','$eventdate','$eventdescription','$locdetails','$lat','$lon')";
        $result=mysqli_query($con,$sql);
        header("location: ../eventshome.php");
        echo"task enterd";
       
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
<body>




<section class="text-gray-600 body-font relative">

  <div class="container px-5 pt-32 mx-auto flex sm:flex-nowrap flex-wrap h-full ">
  
    <div id="map" class="w-1/2 bg-gray-300 rounded-lg overflow-hidden py-20 flex items-end justify-start relative mx-auto">
      
    </div>
    
    
    <div class="w-1/3 bg-white  h-96 mx-auto ">
    <form action="createevent.php" method="post">
    <h2 class="text-gray-900 text-lg mb-5 font-medium title-font">Create Event</h2>
      <h3 class="font-bold mb-1 text-gray-900 ">Event Info</h3>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Event Name</label>
        <input required type="text" id="eventname" name="eventname" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Event Date</label>
        <input required type="date" id="eventdate" name="eventdate" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Description</label>
        <textarea id="eventdescription" name="eventdescription" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3  leading-6 transition-colors duration-200 ease-in-out"></textarea>
        
      </div>  

      <div >
      <h3 class="font-bold mb-1 text-gray-900 ">Event Location</h3>
      <p class="relative my-2">Select Event location on map</p>   
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Location details</label>
        <textarea id="locationdetails" name="locationdetails" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-16 text-base outline-none text-gray-700 py-1 px-3  leading-6 transition-colors duration-200 ease-in-out"></textarea>
        
      </div>   
      <div hidden>
        <input type="text" id="lat" name="lat">
        <input type="text" id="lon" name="lon">
      </div>
      <button type="submit" id="button" class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create</button>
      
      </form>
    </div>
    
  </div>
</section>


</body>
</html>




<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- <div id="map" style="height: 100%;width: 100%;"></div> -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


<script>
    var map = L.map('map').setView([15.591210408203747, 73.81301879882814], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



var searchControl = L.Control.geocoder({
    defaultMarkGeocode: false
}).on('markgeocode', function(e) {
    var latlng = e.geocode.center;
    map.setView(latlng, 15);

    // Use latlng (latitude and longitude) as needed, e.g., store in a form field
    // console.log('Latitude: ' + latlng.lat + ', Longitude: ' + latlng.lng);
}).addTo(map);


var marker=null;

var latitude=0,longitude=0; 
var eventname='',locname='';

map.on('click', function(e) {

  latitude = e.latlng.lat;
      longitude = e.latlng.lng;
    if(confirm('add marker at'+'\nLatitude: ' + latitude + ', Longitude: ' + longitude)){
      
      
      document.getElementById('lat').value=latitude;
      document.getElementById('lon').value=longitude;

      if(marker!=null){
        marker.remove();
      }
    // Use latitude and longitude as needed, e.g., store in a form field
    console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);
      marker=L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(`<b>${eventname}</b><br><div class="">${locname}</div>`)
                        .openPopup();
    }
    
});


document.getElementById('eventname').addEventListener('input', function() {
      eventname = this.value;
      locname=document.getElementById('locationdetails').value
      
      if(marker){
        marker.remove();
        marker=L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(`<b>${eventname}</b><br><div class="">${locname}</div>`)
                        .openPopup();
    }
});

document.getElementById('locationdetails').addEventListener('input', function() {
  eventname = document.getElementById('eventname').value;
  locname=this.value
  
  if(marker){
    marker.remove();
  marker=L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(`<b>${eventname}</b><br><div class=" ">${locname}</div>`)
                        .openPopup();
    }
});
         
            

</script>