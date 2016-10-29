$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
});

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
    var jsonString = JSON.stringify(data);
   jsonString = escape(jsonString);
    console.log(jsonString);
    var formattedAddress = data.formatted_address.split(",").join("<br>");
    
    var content = '<div class="list text-right animated fadeInLeft"><p>';
        if (data.photos[0]){
            content += '<img class="left" src="' + data.photos[0].getUrl({'maxWidth': 500, 'maxHeight': 500}) + '">';
        } else {
            content += '<img class="left" src"http://www.gemologyproject.com/wiki/images/5/5f/Placeholder.jpg">';
        }          
        content += '<form class="form" method="POST">';
        

        content += "<input type='hidden' name='jsonObject' value='" + jsonString + "'>";
        content += '<div class="info"></p><button class="submit" type="submit"><h3>' + data.name + '</h3></button><p>';
        content += (data.rating) ? '<img src="' + rating(data.rating) + '"><br>': 'No Rating Available<br>';
        content += (data.price_level) ? priceFormat(data.price_level) : 'No Price Info Available' ;
        content += '</p><p>' + formattedAddress + '<br></p>';

        content += '</form></div></div>';
    return content;
}

// --------------------------- RENDERS MAP ---------------------------
var map;
var infowindow;
var service;

// --------------------------- GEOLOCATION ---------------------------
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(shoqPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latlon = position.coords.ltitude + "," + position.corrds.longitude;

    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&sensor=false";

    document.getElementById("map").innerHTML = "<img src='" + img_url + "'>";
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
}

// --------------------------- RENDERS MAP ---------------------------
function initMap() {
    var userLoc = new google.maps.LatLng(29.443134, -98.48138);

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 13
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
        types: 'Restaurant'
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
        $('.token').clone().appendTo('.form');
        var action = $('.action').text();
        $('.form').attr('action', action);
        
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





