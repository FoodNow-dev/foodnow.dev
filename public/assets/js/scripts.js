// (function () {
"use strict";

var map;

// ------------------ BUILDS MAP ------------------
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {
            lat: 29.4213001, 
            lng: -98.499774
        }
    });
};
// })();