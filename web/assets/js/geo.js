$(document).ready(function() {
    navigator.geolocation.getCurrentPosition(foundLocation, noLocation);

    function foundLocation(pos)
    {
        var lat = pos.coords.latitude;
        var lon = pos.coords.longitude;
    }
    function noLocation(pos)
    {
        alert("No location.  Please check your browser permissions.");
    }
});

function getLocations() {
    var pins = $("#pins");    
    $.getJSON("locations.php", function(data) {
        $.each(data, function(key, val) {
            var lat = val.lat;
            var lon = val.lon;
            pins.append("<li class=\"list-group-item\">Latitude:" + lat + " Longitude:" + lon + "</li>");
        });
    });
}

function clearLocations() {
    var pins = $("#pins");
    pins.empty();
}

function setLocation() {
    navigator.geolocation.getCurrentPosition(foundLocation, noLocation);
    function foundLocation(pos)
    {
        var lat = pos.coords.latitude;
        var lon = pos.coords.longitude;
        $.getJSON("locations.php?cmd=set&lat=" + lat + "&lon=" + lon, function(data) {
            clearLocations();
            getLocations();
        });
    }
    function noLocation(pos)
    {
        alert("No location.  Please check your browser permissions.");
    }
}
