function initMap() {
    'use strict';

    var target = document.getElementById('target');
    var geocoder = new google.maps.Geocoder();
    var marker;
    var map;

    // Geocoding: Address -> LatLng
    // Reverse Geocoding: LatLng -> Address

    document.getElementById('search').addEventListener('click', function() {
        geocoder.geocode({
            address: document.getElementById('address').value
        }, function(results, status) {
            if (status !== 'OK') {
                alert('Failed: ' + status);
                return;
            }
            // results[0].geometry.location
            if (results[0]) {
                map = new google.maps.Map(target, {
                    center: results[0].geometry.location,
                    zoom: 15
                    
                });
                marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    title: document.getElementById('shop-name').value
                });
            }
            else {
                alert('No results found');
                return;
            }
        });
    });

    


}
