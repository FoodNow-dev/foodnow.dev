var map;
var infowindow;
var service;

// --------------------------- GEOLOCATION ---------------------------
function getLocation() {
    console.log("getLocation")

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    console.log("showPosition");

    var latlon = position.coords.latitude + ", " + position.coords.longitude;

    // var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=" + latlon + "&zoom=14&size=400x300&sensor=false";

    // document.getElementById("map").innerHTML = "<img src='" + img_url + "'>";

    // console.log(latlon);
    initMap(latlon);
}

function showError(error) {
    console.log("showError");

    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.")
            break;
        case error.PERMISSION_UNAVAILABLE:
            alert("Location information is unavailable.")
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.")
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.")
            break;
    }
}

// --------------------------- RENDERS MAP ---------------------------
function initMap(latlon) {
    console.log("initMap");

    // var userLoc = new google.maps.LatLng(29.443134, -98.48138);
    var userLoc = new google.maps.LatLng(latlon);

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 17
    });
    
    infowindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);
    service.textSearch({
        location: userLoc,
        query: 'French',
        type: 'restaurant',
        radius: 50000
    }, callback);
}

// --------------------------- AFTER MAP IS MADE ---------------------------
// --------------------------- MARKERS WILL BE PLACED ---------------------------
function callback(results, status) {
    console.log("callback");

    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    console.log("createMarker");
    
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        id: place.place_id
    });
    var request = {
        reference: place.reference
    };

// --------------------------- INFOWINDOWS ---------------------------
    google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var contentStr = '<div>';
                    // PLACE ID
                    // + '<strong><em>PLACE ID: </em></strong>' + place.place_id + '<br>'

                    // PHOTOS
                    contentStr += (place.photos) ? '<img class="pull-left" src="' + place.photos[0].getUrl({'maxWidth': 100, 'maxHeight': 100}) + '">' : "<br><em>No Image Provided</em><br>";
                    // NAME
                    contentStr += '<strong>' + place.name + '</strong>';
                    // ADDRESS
                    contentStr += (place.vicinity) ? '<br>' + place.vicinity : "<br><em>No Address Provided</em>";
                    // PRICE LEVEL
                    contentStr += (place.price_level) ? '<br>'+ place.price_level : "<br><em>No Prices Provided</em>";
                    // RATING
                    contentStr += (place.rating)? ' • '+ place.rating : "<br><em>No Ratings Yet</em>";
                    contentStr += '</div>'

                infowindow.setContent(contentStr);
                infowindow.open(map, marker);
                console.log(place)
            }
        });
    });
}





