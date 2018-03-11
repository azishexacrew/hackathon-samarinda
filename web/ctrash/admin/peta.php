<?php
  include "konek.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 900px;
        height: 500px;
      }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
    <script>
    var marker;

      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
        
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php
            $query = mysql_query("select * from obyek");
          while ($data = mysql_fetch_array($query)) {
            $lat = $data['lat'];
            $lon = $data['lon'];
            $nama = $data['nm_obyek'];
            echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>
 