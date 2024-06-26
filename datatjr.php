<!DOCTYPE html>
<html lang="en">
<head>
    <!--https://developers.google.com/maps/documentation/javascript/tutorial?hl=zh-tw#HelloWorld-->
    <meta charset="UTF-8">
    <title>Google Map</title>
     <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #location-map { height: 300px; }
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=zh-TW"></script>
</head>
<body onload="initialize()">
<div id="location-map"></div>
<script type="text/javascript">
   var myMap;
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var marker;
    var addr_comps = new Array();

    function initialize() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                mapServiceProvider(position.coords.latitude, position.coords.longitude);
            },errorHandler);
        } else {
            console.log('瀏覽器不支援 HTML5 定位');
            // notify('瀏覽器不支援 HTML5 定位, 請手動設定地址！', 'error');
        }
    }//end initialize

    function errorHandler(error) {
        switch (error.code) {
            case error.TIMEOUT:
                console.log('連線逾時');
                // notify('連線逾時, 請重試！', 'error');
                break;
            case error.POSITION_UNAVAILABLE:
                console.log('無法取得定位！');
                // notify('無法取得定位！', 'error');
                break;
            case error.PERMISSION_DENIED://拒絕
                console.log('請開啓手機的GPS定位功能！');
                // notify('請開啓手機的GPS定位功能！', 'error');
                break;
            case error.UNKNOWN_ERROR:
                console.log('不明的錯誤，請稍候再試');
                // notify('不明的錯誤，請稍候再試！', 'error');
                break;
        }
    }//end errorHandler

    //reverse geocoding
    function codeLatLng(latlng) {
        // reportLocation.reset();
         geocoder.geocode({'latLng': latlng},function(results, status){
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                addr_comps = results[0].address_components;
                var content = "<div id='content' class='report-address-info-window'>" + results[0].formatted_address + "</div>"
                infowindow.setContent(content);
                infowindow.open(myMap, marker);
                $('input#location').val(results[0].formatted_address);
              } else {
                console.log("codeLatLng fail, no result found");
                notify("無法取得地址, 請手動設定地址！", "error");
              }
            } else {
              console.log("codeLatLng failed due to: " + status);
              notify("無法取得地址, 請手動設定地址！", "error");
            }
         });
    }//end codeLatLng

    function mapServiceProvider(lat, lng) {   
        var latlng = new google.maps.LatLng(lat, lng);
            
        var mapOptions = {  
            zoom: 12,  
            center: latlng,  
            mapTypeControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP  
        }; 
            
        myMap = new google.maps.Map(document.getElementById("location-map"), mapOptions); 
        marker = new google.maps.Marker({  
            position: latlng,  
            map: myMap,
            draggable:true,
        });

        myMap.setZoom(18);
        myMap.setCenter(marker.getPosition());
        codeLatLng(latlng);
        
        google.maps.event.addListener(marker, 'dragend', function() {
          var point = marker.getPosition();
          myMap.panTo(point);
          codeLatLng(point);
        });
      }//end mapServiceProvider
</script>
</body>
</html>