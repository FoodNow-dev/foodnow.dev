

function priceFormat(level) {
    switch (level) {
        case 1 :
            return '$';
        case 2 :
            return '$$';
        case 3 :
            return '$$$';
        case 4 :
            return '$$$$';
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
    console.log(data);
    var formattedAddress = data.formatted_address.split(",").join("<br>");
    
    var content = '<div class="list text-right animated fadeInLeft"><p>';
        if (data.photos[0]){
            content += '<img class="left" src="' + data.photos[0].getUrl({'maxWidth': 500, 'maxHeight': 500}) + '">';
        } else {
            content += '<img class="left" src"http://www.gemologyproject.com/wiki/images/5/5f/Placeholder.jpg">';
        }          
        content += '<div class="info"></p><h3>' + data.name + '</h3><p>';
        content += (data.rating) ? '<img src="' + rating(data.rating) + '">': 'No Rating Available';
        content += '</p><p>' + formattedAddress + '<br>';
        content += (data.price_level) ? priceFormat(data.price_level) : 'No Price Info Available' ;
        content += '</p></div></div>';
    return content;
}

var map;
var infowindow;
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
                query: 'French',
                type: ['Restaurant']
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
            $('#results').append(item_tmpl(results[i]));
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
    
    google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var contentStr = '<div>' 
                    + '<strong><em>PLACE ID: </em></strong>' + place.place_id + '<br>'
                    + '<img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '"> <br>'
                    + '<strong>' + place.name + '</strong> <br>'
                    + place.vicinity + '<br>'

                    + place.formatted_phone_number + '<br>'
                    + '<a>' + place.website + '</a> <br>'
                    + '<strong><em>OPEN: </em></strong>' + place.opening_hours.open_now + '<br>'
                    + '<strong><em>PRICE LEVEL: </em></strong>' + place.price_level + '<br>'
                    + '<strong><em>RATING: </em></strong>' + place.rating + '<br>'
                    + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].author_name + '<br>'
                    + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].rating + '<br>'
                    + '<strong><em>REVIEW: </em></strong>' + place.reviews[0].text + '<br>'

                infowindow.setContent(contentStr);
                infowindow.open(map, marker);
            }
        });
    });
    gmarkers.push(marker);
    var side_bar_html = "<a href='javascript:google.maps.event.trigger(gmarkers[" + parseInt(gmarkers.length - 1) + "],\"click\");'>" + place.name + "</a><br>";
}

function openInfoWindow(id) {
    return true;
}
