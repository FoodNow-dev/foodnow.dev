$('#myCarousel').carousel({
    interval: 5000
});

$('#carousel-text').html($('#slide-content-0').html());

//Handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
    var id_selector = $(this).attr("id");
    var id = id_selector.substr(id_selector.length-1);
    var id = parseInt(id);
    $('#myCarousel').carousel(id);
});

// When the carousel slides, auto update the text
$('#myCarousel').on('slid', function (e) {
    var id = $('.item.active').data('slide-number');
    $('#carousel-text').html($('#slide-content-'+id).html());
});

function timeSince(date) {

    var seconds = Math.floor((new Date() / 1000) - (new Date(date)));

    var interval = Math.floor(seconds / 31536000);

    if (interval > 1) {
        return interval + " years";
    }
    interval = Math.floor(seconds / 2592000);
    if (interval > 1) {
        return interval + " months";
    }
    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + " days";
    }
    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + " hours";
    }
    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + " minutes";
    }
    return Math.floor(seconds) + " seconds";
}


var map;
var infowindow;
var service;
var foodType = ["breakfast restaurant", "american restaurant", "cajun restaurant", "chinese restaurant", "german restaurant", "indean restaurant", "italian restaurant", "japanese restaurant", "mediterranean restaurant", "mexican restaurant", "soul restaurant", "thai restaurant", "vietnamese restaurant"]

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

// --------------------------- GEOLOCATION ---------------------------
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    initMap(lat, lon);
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
function initMap(lat, lon) {
    var userLoc = new google.maps.LatLng(29.424122, -98.493628);
    // var userLoc = new google.maps.LatLng(lat, lon);

    map = new google.maps.Map(document.getElementById('map'), {
        center: userLoc,
        zoom: 10
    });

    var circle = new google.maps.Marker({
        position: userLoc,
        map: map,
        icon: {
            url: '/assets/img/blue.png',
            scaledSize: new google.maps.Size(40, 50)
        }
    });

    infowindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);
    service.textSearch({
        location: userLoc,
        query: foodType[Math.floor(Math.random() * foodType.length)],
        type: 'restaurant',
        radius: 7000,
    }, callback);
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        createMarker(results[Math.floor(Math.random() * results.length)]);
        
    }
}
// --------------------------- AFTER MAP IS MADE ---------------------------
// --------------------------- MARKERS WILL BE PLACED ---------------------------

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

    service.getDetails(request, function(details, status) {
        var content;
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            content = '<h2>' + details.name + '</h2>';
            content += '<img src="' + rating(details.rating) + '">';
            content += '<h4>' + priceFormat(details.price_level) + '</h4>';
            content += '<h4>' + details.formatted_phone_number + '</h4>';
            content += '<h4>' + details.address_components[0].long_name + " ";
            content += details.address_components[1].long_name + '</h4>';
            $('.description').append(content);

            if(details.photos) {
                details.photos.forEach(function(photo, i) {
                    var carouselPics = '<div class="' + ((i == 0)? "active item" : "item");
                    carouselPics += '" data-slide-number="' + (i + 1) + '">';
                    carouselPics += '<img class="rest-img" src="' + photo.getUrl({'maxwidth': 500, 'maxHeight': 500}) + '"></div>';
                    $('.carousel-inner').append(carouselPics);
                });
            } else {
                $('.carousel-inner').append('<div class="active item" data-slide-number="1"> <img class="rest-img" src="http://placehold.it/377x200?text=No+Images+Available"></div>');
            }

            if(details.reviews){
                details.reviews.forEach(function(review, i) {
                    var reviewContent = '<div class="review-container"><div class="col-sm-12 form-bottom show-box"><img class="google-profile" src="' + ((review.profile_photo_url) ? review.profile_photo_url : 'https://www.carthage.edu/themes/toph/assets/img/generic-logo.png');
                    reviewContent += '"><div class="review-rest-info text-right"><h3><b>' + review.author_name;
                    reviewContent += '</b></h3><p><img class="stars" src="' + rating(review.rating) + '"></p>';
                    reviewContent += '<p>' + timeSince(review.time) + ' ago</p><br><br></div><div class="review">' + review.text;
                    reviewContent += '<br><br></div></div></div>';

                    $('.form-box').append(reviewContent);
                });
            }
        }
    });

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
            }
        });
    });
}





