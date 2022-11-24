var lati, lngi;
window.addEventListener("load", (event) => {
    getLocation();
});


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {

    }
}

function showPosition(position) {
    lati = position.coords.latitude;
    lngi = position.coords.longitude;
    map_start(lati, lngi);
}

function map_start(lati, lngi) {
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
            lat: lati,
            lng: lngi
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: lati,
            lng: lngi
        },
        map: map,
        draggable: true
    });

    map.addListener('click', function (e) {
        placeMarker(e.latLng, map);
    });
}
function placeMarker(position, map) {
    if (marker)
        marker.setMap(null);
    document.getElementById("lat").value = position.lat();
    document.getElementById("lng").value = position.lng();
    console.log(position.lat(), position.lng());
    marker = new google.maps.Marker({
        position: position,
        map: map
    });
    map.panTo(position);
}