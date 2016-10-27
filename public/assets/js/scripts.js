var map;
var infowindow;
var service;
var gmarkers = [];
var geocoder = null;
var bounds = null;

// --------------------------- RENDERS MAP ---------------------------
function initMap() {
    geocoder = new google.maps.Geocoder();
    var userLoc = new google.maps.LatLng(29.443134, -98.48138);

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 15
    });

    geocoder.geocode({'address': "San Antonio, TX"}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var point = results[0].geometry.location;

            infowindow = new google.maps.InfoWindow();
            service = new google.maps.places.PlacesService(map);
            service.textSearch({
                location: userLoc,
                query: 'Thai'
            }, callback);
        } else {
            alert("Geocode was not successful for the following reason: ")
        }
    })
}

// --------------------------- AFTER MAP IS MADE ---------------------------
// --------------------------- MARKERS WILL BE PLACED ---------------------------
function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
        // console.log(results)
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        id: place.place_id
    });
    var request = {
        reference: place.reference
    };
        // console.log(marker.id)

    google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var contentStr = '<div>' 
                    + '<strong><em>PLACE ID: </em></strong>' + place.place_id + '<br>'
                    + '<strong>' + place.name + '</strong> <br>';

                    contentStr += (place.photos[0]) ? '<img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '">' : "<br><em>No Image Provided</em>";
                    
                    contentStr += (place.vicinity) ? '<br>' + place.vicinity : "<br><em>No Address Provided</em>";
                    
                    contentStr += (place.formatted_phone_number) ? '<br>' + place.formatted_phone_number : "<br><em>No Phone Number Provided</em>";
                    
                    contentStr += (place.website) ? '<br> <a href="' + place.website + '">Website</a>' : "<br><em>No Website Provided</em>";
                    
                    contentStr += (place.opening_hours) ? '<br>'+ place.opening_hours.open_now : "<br><em>No Hours Provided</em>";
                    
                    contentStr += (place.price_level) ? '<br>'+ place.price_level : "<br><em>No Prices Provided</em>";
                    
                    contentStr += (place.rating)? '<br>'+ place.rating : "<br><em>No Ratings Yet</em>";
                    
                    contentStr += (place.reviews[0].author_name) ? '<br>'+ place.reviews[0].author_name : "<br><em>No Reviews Yet</em>";
                    
                    contentStr += (place.reviews[0].rating) ? '<br>'+ place.reviews[0].rating : "<br><em>No Reviews Yet</em>";
                    
                    contentStr += (place.reviews[0].text) ? '<br>'+ place.reviews[0].text : "<br><em>No Reviews Yet</em>";

                infowindow.setContent(contentStr);
                infowindow.open(map, marker);
                console.log(place)
            }
        });
    });
    gmarkers.push(marker);
    var side_bar_html = "<a href='javascript:google.maps.event.trigger(gmarkers[" + parseInt(gmarkers.length - 1) + "],\"click\");'>" + place.name + "</a><br>";

}

function openInfoWindow(id) {
    return true;
}






