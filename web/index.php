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
      var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(lat, lon)
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
      $.each(locations, function(key, val) {
        new google.maps.Marker({
            position: new google.maps.LatLng(val.lat, val.lon),
            map: map,
            title: val.name
        });
      });
    }
    

    </script>
  </head>
  <body>
        <div id="map-canvas"></div> 
        <div id="pinNameModal" class="modal fade"><div class="modal-dialog modal-sm"><div class="modal-content"><form class="form-inline"><input type="text" class="form-control" placeholder="Please enter a name" id="pinName"><button class="btn btn-primary pin-it" id="pinIt">Pin It</button></form></div></div></div>
        <button class="btn btn-primary btn-lg addPinBtn" id="addPin">Add a pin</button>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/gmapsgeo.js"></script>
        <script src="assets/js/gmaps.js"></script>
        <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
