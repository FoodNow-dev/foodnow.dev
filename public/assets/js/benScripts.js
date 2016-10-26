

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

function item_tmpl(data){
    var content = '<div class="list text-right"><p><img src="' + data.photos[0].getUrl({'maxWidth': 500, 'maxHeight': 500}) + '"><h3>' + data.name + '</h3></p><p>' +
    data.formatted_address + '</p>' + priceFormat(data.price_level) + '</div><br>';
    return content;
}


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
        radius: 20,
        // type: ['restaurant']
    }, callback);
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
            $('#results').append(item_tmpl(results[i]));
        }
            console.log(results.length)
        

    }
}


function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        id: place.place_id
        });
       


    google.maps.event.addListener(marker, 'click', function() {
        var content;
            if(place.photos) {
                content = '<div> <img src="' + place.photos[0].getUrl({'maxWidth': 50, 'maxHeight': 50}) + '"> <br>';
            } else {
                content = '<div> <img src="http://placehold.it/50x50"> <br>';
            }
            content += '<strong>' + place.name + '</strong> <br>'
            + place.rating + ' • '
            + place.price_level + '<br>'
            
            // + place.formatted_address + '<br>'
            // + place.opening_hours.open_now + '<br>'
            + '</div>';
        
        infowindow.setContent(content);
        infowindow.open(map, this);
    });
}








