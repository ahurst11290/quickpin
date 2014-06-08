$(document).ready(function() {
    navigator.geolocation.getCurrentPosition(foundLocation, noLocation);

    function foundLocation(pos)
    {
        var lat = pos.coords.latitude;
        var lon = pos.coords.longitude;
        getLocationsObj(lat, lon, initialize);
    }
    function noLocation(pos)
    {
        alert("No location.  Please check your browser permissions.");
    }
});


function getLocationsObj(lat, lon, cb) {
    $.getJSON("locations.php", function(data) {
        cb(lat, lon, data);
    });
}

function setLocation() {
    navigator.geolocation.getCurrentPosition(foundLocation, noLocation);
    function foundLocation(pos)
    {
        var lat = pos.coords.latitude;
        var lon = pos.coords.longitude;
        $.getJSON("locations.php?cmd=set&lat=" + lat + "&lon=" + lon, function(data) {
            console.log("Adding new location:");
            console.log(lat);
            console.log(lon);
            console.log(map);
            new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lon),
                    map: map,
                    title: "N/a"
            });
        });
    }
    function noLocation(pos)
    {
        alert("No location.  Please check your browser permissions.");
    }
}
