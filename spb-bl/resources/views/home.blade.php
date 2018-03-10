@extends('_layouts.basic')

@section('script-top')
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */

    #mapDiv {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
@endsection

@section('content')

  <div onload="initMap()" id="mapDiv"></div>

@endsection

@section('script-bottom')
  <script>
  var marker;
  function initMap() {
        var mapCanvas = document.getElementById('mapDiv');
        var mapOptions = {
          center: {lat: -0.4889394, lng: 117.1317131},
          zoom: 10,
        }


    var map = new google.maps.Map(document.getElementById('mapDiv'), mapOptions);
        var infoWindow = new google.maps.InfoWindow;
        var bounds = new google.maps.LatLngBounds();

        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
         });
    }
    var ctaLayer = new google.maps.KmlLayer({
        url: 'http://rezapadillah.github.io/samarinda.kml',
        map: map
    });


  function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt,
            icon: "{{ asset('img/marker.png') }}"

            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
          addMarker(-0.483581,117.1293713, 'Lokasi 1');
          addMarker(-0.483381,117.1243713, 'Lokasi 2');
          addMarker(-0.483281,117.1593713, 'Lokasi 3');
          addMarker(-0.4905398,117.1435271, 'Plaza Mulia');
          addMarker(-0.5037861,117.1527143, 'Samarinda Central Plaza');
          addMarker(-0.5255916,117.113777, 'Bigmall');
          addMarker(-0.4985521,117.1418411, 'Citra Niaga <br> Jumlah Tenan : {{ count($data['data']) }} <br> Luas : 900m x 600m');

  }
      </script>
      <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjCbS7STCpdHg7L_pAJ1gXcCN00cKPFaY&callback=initMap">
      </script>

@endsection
