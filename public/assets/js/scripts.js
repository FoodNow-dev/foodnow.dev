// var map;
// var infowindow;
// // var request;
// var service;
// var markers;

// // --------------------------- RENDERS MAP ---------------------------
// function initMap() {
//     var userLoc = {lat: 29.426791, lng: -98.489602};

//     map = new google.maps.Map(document.getElementById('map'), {
//         center: userLoc,
//         zoom: 15
//     });

//     infowindow = new google.maps.InfoWindow();
//     service = new google.maps.places.PlacesService(map);
//     service.textSearch({
//     // service.getDetails({
//         location: userLoc,
//         query: 'French',
//         // change to read miles correctly
//         radius: 8046.72,
//         // type: ['restaurant']
//     }, callback);
// }

// // --------------------------- AFTER MAP IS MADE ---------------------------
// // --------------------------- MARKERS WILL BE PLACED ---------------------------
// function callback(results, status) {
//     if (status === google.maps.places.PlacesServiceStatus.OK) {
//         for (var i = 0; i < results.length; i++) {
//             createMarker(results[i]);
//         }
//         // console.log(results)
//     }
// }

// function createMarker(place) {
//     var placeLoc = place.geometry.location;
//     var marker = new google.maps.Marker({
//         map: map,
//         position: place.geometry.location,
//         id: place.place_id
//         });
//         // console.log(marker.id)

//     google.maps.event.addListener(marker, 'click', function() {
//         infowindow.setContent(
//             '<div> <img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '"> <br>'
//             + '<strong>' + place.name + '</strong> <br>'
//             + place.rating + ' • '
//             + place.price_level + '<br>'
            
//             // + place.formatted_address + '<br>'
//             // + place.opening_hours.open_now + '<br>'
//             + '</div>');
//         // console.log(place.photos[0].getUrl({'maxWidth': 200, 'maxHeight': 200}))
//         infowindow.open(map, this);
//         // console.log(place);
//         return marker;
//     });
// }






var map;
var infowindow;
// var request;
var service;
var gmarkers = [];
var geocoder = null;
var bounds = null;

// --------------------------- RENDERS MAP ---------------------------
function initMap() {
    geocoder = new google.maps.Geocoder();
    var userLoc = new google.maps.LatLng(29.426791, -98.489602);

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
                query: 'French'
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


                    if (!!place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50})) contentStr += '<img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '">';
                    if (!!place.vicinity) contentStr += '<br>' + place.vicinity;
                    if (!!place.formatted_phone_number) contentStr += '<br>' + place.formatted_phone_number;
                    if (!!place.website) contentStr += '<br> <a href="' + place.website + '">Website</a>';
                    if (!!place.opening_hours.open_now) contentStr += '<br>'+ place.opening_hours.open_now;
                    if (!!place.price_level) contentStr += '<br>'+ place.price_level;
                    if (!!place.rating) contentStr += '<br>'+ place.rating;
                    if (!!place.reviews[0].author_name) contentStr += '<br>'+ place.reviews[0].author_name;
                    if (!!place.reviews[0].rating) contentStr += '<br>'+ place.reviews[0].rating;
                    if (!!place.reviews[0].text) contentStr += '<br>'+ place.reviews[0].text;


                    // + '<img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '"> <br>'
                    // + place.formatted_phone_number + '<br>'
                    // + '<a>' + place.website + '</a> <br>'
                    // + '<strong><em>OPEN: </em></strong>' + place.opening_hours.open_now + '<br>'
                    // + '<strong><em>PRICE LEVEL: </em></strong>' + place.price_level + '<br>'
                    // + '<strong><em>RATING: </em></strong>' + place.rating + '<br>'
                    // + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].author_name + '<br>'
                    // + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].rating + '<br>'
                    // + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].text + '<br>'

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






