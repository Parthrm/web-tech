<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<div id="map" style="height: 400px;width: 400px;"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
    var map = L.map('map').setView([15.463891, 73.858108], 12); // Default center and zoom level

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


map.on('click', function(e) {
    var latitude = e.latlng.lat;
    var longitude = e.latlng.lng;

    // Use latitude and longitude as needed, e.g., store in a form field
    console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);
});







</script> -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


<div id="map" style="height: 400px;"></div>
<input type="text" id="searchInput" placeholder="Enter location">

<script>
    var map = L.map('map').setView([15.591210408203747, 73.81301879882814], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);




// var marker=L.marker([0, 0]).addTo(map);
var marker;

map.on('click', function(e) {
    if(marker){
        marker.remove();
    }
    var latitude = e.latlng.lat;
    var longitude = e.latlng.lng;
    
    // Use latitude and longitude as needed, e.g., store in a form field
    console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);
    
    
    if(confirm('add marker at'+'\nLatitude: ' + latitude + ', Longitude: ' + longitude)){
        marker=L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(`<b>Placeholder</b>`)
                        .openPopup();
    }
});






    var searchControl = L.Control.geocoder({
        defaultMarkGeocode: false
    }).on('markgeocode', function(e) {
        var latlng = e.geocode.center;
        map.setView(latlng, 12);
    }).addTo(map);

    document.getElementById('searchInput').addEventListener('input', function() {
        var query = this.value;
        searchControl.addTo(map).geocode(query)
    });

</script>