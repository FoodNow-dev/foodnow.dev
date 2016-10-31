function priceFormat(level) {
    switch (level) {
        case 1 :
            return '$';
        case 2 :
            return '$ $';
        case 3 :
            return '$ $ $';
        case 4 :
            return '$ $ $ $';
    }

}
var priceSign = '<p>' + priceFormat(price) + '</p>';
$(priceSign).appendTo('#rating');

function rating(level) {
    switch (true) {
        case (level < .25) :
            return '/assets/img/star-rating0.png';
        case (level >= .25 && level < .75) :
            return '/assets/img/star-rating-half.png';
        case (level >= .75 && level < 1.25) :
            return '/assets/img/star-rating1.png';
        case (level >= 1.25 && level < 1.75) :
            return '/assets/img/star-rating1half.png';
        case (level >= 1.75 && level < 2.25) :
            return '/assets/img/star-rating2.png';
        case (level >= 2.25 && level < 2.75) :
            return '/assets/img/star-rating2half.png';
        case (level >= 2.75 && level < 3.25) :
            return '/assets/img/star-rating3.png';
        case (level >= 3.25 && level < 3.75) :
            return '/assets/img/star-rating3half.png';
        case (level >= 3.75 && level < 4.25) :
            return '/assets/img/star-rating4.png';
        case (level >= 4.25 && level < 4.75) :
            return '/assets/img/star-rating4half.png';
        case (level >= 4.75) :
            return '/assets/img/star-rating5.png';
    }
}

var ratingImg = "<img src='" + rating(element) + "'>";
$(ratingImg).appendTo('#rating');

console.log(reviewRating);
reviewRating.forEach(function(element, index){
    var reviewStars = "<img src='" + rating(reviewRating) + "'>" ;
    var div = '#reviewStars' + index;
    $(reviewStars).html(div);
});

// --------------------------- GEOLOCATION ---------------------------
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latitude = (position) ? position.coords.latitude : lat;
    var longitude = (position) ? position.coords.longitude : lng;

    initMap(latitude, longitude);
}

function showError(error) {
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
    showPosition();
}
// --------------------------- RENDERS MAP ---------------------------
var map;
var infowindow;
var service;

function initMap(latitude, longitude) {
    var userLoc = new google.maps.LatLng(latitude, longitude);
    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 15
    });

        
    infowindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);
    service.textSearch({
        location: userLoc,
        types: 'Restaurant'
    }, callback);
}

// --------------------------- AFTER MAP IS MADE ---------------------------
// --------------------------- MARKERS WILL BE PLACED ---------------------------
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
        position: place.geometry.location
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