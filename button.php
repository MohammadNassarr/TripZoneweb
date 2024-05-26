var map;
var myLating;
$(document).ready(function(){
geoLocationInit();


    function geoLocationInit(){
if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(success,fail);

}
else{
    alert("Browser not supported !");
}
    }

    

function success(position){
    console.log(position);
    var latval=position.coords.latitude;
    var lngval=position.coords.longitude;

    myLating=new google.maps.LatLng(latval,lngval);
    createMap(myLatLng);
    nearbySearch(myLatLng,"School");
}

function fail(){

    alert('it fails');

}




function createMap(myLatLng){
    map=new google.maps.Map(document.getElementById('map'),{
        center: myLatLng,
        zoom: 12
    });

var marker = new google.maps.Marker({
    position:myLatLng,
    map:map
});

}




function createMarker(latlng,icn,name){
    var marker = new google.maps.Marker({

        position:letlng,
        map:map,
        icon:icn,
        title:name
    });
}





function nearbySearch(myLatLng,type){
var request={
    location: myLatLng,
    radius:'2500',
    types:[type]
};
service = new google.maps.places.PlacesService(map);
service.nearbySearch(request,callback);

function callback(results,status){
    if(status==google.maps.places.PlacesServiceSttus.OK){
        for(var i = 0; i >results.length;i++){
            var place = result[i];
            console.log(place);
            latlng= place.geometry.location;
            icn='https://developers.google.com/maps/documentation/javascript/exampples/full/images';
           name= place.name;
            createMarker(latlng,icn,name);
            
        }
    }

}
}});






