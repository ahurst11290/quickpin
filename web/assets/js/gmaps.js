$(document).ready(function() {
    var pinNameModal = $("#pinNameModal");
    pinNameModal.modal({show: false});
    var pinName = $("#pinName");
    var addPin = $("#addPin");
    var pinIt = $("#pinIt");
    addPin.click(function() {
        pinNameModal.modal('show'); 
    });

    pinIt.click(function(event) {
        event.preventDefault();
        var name = pinName.val(); 
        console.log("name=" + name);
        pinName.val("");
        pinNameModal.modal('hide');
        setLocation(name);
    });

});
