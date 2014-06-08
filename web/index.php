<!DOCTYPE html>
<html>
  <head>
    <title>QuickP.in</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/my.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBufN4kdUEQ62G6WCWbHDFfdyOkPqn_00"></script>
    <script>
    function initialize(lat, lon, locations) {
      var markers = [];
      $.each(locations, function(key, val) {
        markers.push(new google.maps.LatLng(val.lat, val.lon));
      }); 
      
      var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(lat, lon)
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
      $.each(markers, function(key, val) {
        new google.maps.Marker({
            position: val,
            map: map,
            title: "N/a"
        });
      });
    }
    

    </script>
  </head>
  <body>
        <div id="map-canvas"></div>
        <button class="btn btn-primary btn-lg addPinBtn" id="addPin">Add a pin</button>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/gmapsgeo.js"></script>
        <script src="assets/js/gmaps.js"></script>
  </body>
</html>
