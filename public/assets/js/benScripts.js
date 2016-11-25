
radius *= 1609.34;

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

function item_tmpl(data){
    
    var formattedAddress = data.formatted_address.substring(data.formatted_address.indexOf(","), 1);
    
    var content = '<div class="list text-right"><a href="/restaurants/show?place_id=' + data.place_id + '"><p>';
        if (data.photos){
            content += '<img class="left" src="' + data.photos[0].getUrl({'maxWidth': 400, 'maxHeight': 250}) + '">';
        } else {
            content += '<img class="left" src"http://www.gemologyproject.com/wiki/images/5/5f/Placeholder.jpg">';
        }          
        content += '<div class="info"></p><h4>' + data.name + '</h4><p>';
        content += (data.rating) ? '<img src="' + rating(data.rating) + '"><br>': 'No Rating Available<br>';
        content += (data.price_level) ? priceFormat(data.price_level) : 'No Price Info Available' ;
        content += '</p><p>' + formattedAddress + '<br></p>';

        content += '</div></div></a>';
    return content;
}

// --------------------------- RENDERS MAP ---------------------------
var map;
var infowindow;
var service;

// --------------------------- GEOLOCATION ---------------------------
// function getLocation() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition, showError);
//     } else {
//         alert("Geolocation is not supported by this browser.");
//     }
// }

// function showPosition(position) {
//     var lat = (position) ? position.coords.latitude : 29.443134;
//     var lon = (position) ? position.coords.longitude : -98.48138;

//     initMap(lat, lon);
// }

// function showError(error) {
//     switch(error.code) {
//         case error.PERMISSION_DENIED:
//             alert("User denied the request for Geolocation.")
//             break;
//         case error.PERMISSION_UNAVAILABLE:
//             alert("Location information is unavailable.")
//             break;
//         case error.TIMEOUT:
//             alert("The request to get user location timed out.")
//             break;
//         case error.UNKNOWN_ERROR:
//             alert("An unknown error occurred.")
//             break;
//     }
//     showPosition();
// }

// --------------------------- RENDERS MAP ---------------------------
function initMap(lat, lon) {
    // var userLoc = new google.maps.LatLng(lat, lon);
    var userLoc = new google.maps.LatLng(29.474201, -98.627893);
    

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 13
    });
    
     var circle = new google.maps.Marker({
        position: userLoc,
        map: map,
        icon: {
            url: '/assets/img/blue.png',
            scaledSize: new google.maps.Size(50, 60)
        }
    });
     
    infowindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);
    service.textSearch({
        location: userLoc,
        radius: radius,
        open_now: true,
        query: food,
        minPriceLevel: minPrice,
        maxPriceLevel: maxPrice,
        types: ['Restaurant']
    }, callback);
}

// --------------------------- AFTER MAP IS MADE ---------------------------
// --------------------------- MARKERS WILL BE PLACED ---------------------------
function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
            $('#results').append(item_tmpl(results[i]));
        }
        // $('.token').clone().appendTo('.form');
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

// --------------------------- INFOWINDOWS ---------------------------
     google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var contentStr = '<div>';
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
            }
        });
    });
}





