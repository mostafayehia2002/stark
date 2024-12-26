let map;
let marker;
let latitudeInput = document.getElementById('latitude');
let longitudeInput = document.getElementById('longitude');
let addressInput = document.getElementById('address');
let lat = parseFloat(latitudeInput.value) || 24.7136;
let lng = parseFloat(longitudeInput.value) || 46.6753;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lng},
        zoom: 12
    });
    marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: map,
        draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
         lat = event.latLng.lat();
         lng = event.latLng.lng();
        console.log('New location:', lat, lng);
        //add value to input
        latitudeInput.value = lat;
        longitudeInput.value = lng;

      //get address
        getAddress(lat, lng);
    });

}
function getAddress(lat, lng) {
    const geocoder = new google.maps.Geocoder();
    const latLng = { lat: lat, lng: lng };
    geocoder.geocode({ location: latLng }, function (results, status) {
        if (status === 'OK') {
            if (results[0]){
                addressInput.value = results[0].formatted_address;
                console.log(results[0].formatted_address);
            } else {
                addressInput.value = 'لم يتم العثور على عنوان';
            }
        } else {
            console.error('Geocoder failed due to: ' + status);
            addressInput.value = 'حدث خطأ أثناء جلب العنوان';
        }
    });
}
window.onload = function () {
    if (latitudeInput.value && longitudeInput.value) {
        lat = parseFloat(latitudeInput.value);
        lng = parseFloat(longitudeInput.value);
        initMap();
    } else {
        initMap();
    }
};
