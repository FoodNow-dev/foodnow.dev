var map;
var infowindow;

function initMap() {
    var userLoc = {lat: 29.426791, lng: -98.489602};

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 15
    });

    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.textSearch({
    // service.getDetails({

        location: userLoc,
        query: 'French',
        radius: 8046.72,
        // type: ['restaurant']
    }, callback);
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}


function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        id: place.place_id
        });
        // console.log(marker.id)


    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(
            // '<div><strong>' + place.name + '</strong>' + '<br>'
            '<div> <img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '"> <br>'
            + '<strong>' + place.name + '</strong> <br>'
            + place.rating + ' • '
            + place.price_level + '<br>'
            
            // + place.formatted_address + '<br>'
            // + place.opening_hours.open_now + '<br>'
            + '</div>');
        // console.log(place.photos[0].getUrl({'maxWidth': 200, 'maxHeight': 200}))
        infowindow.open(map, this);
        console.log(place);
    });
}








