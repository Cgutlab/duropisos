@extends('public.main')

@section('headTitle', 'Distribuidores | Duro Pisos')
@section('bodyTitle', 'Distribuidores')

@section('body')
@include('public.basico.header')
<main>
    <div style="height:500px" id="mapa"></div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFezEnY8YFmpHS8CKv48a4UPZKhiUriuQ&callback=initMap"></script>
    <script type="text/javascript">
        window.marcadores = {!! json_encode($Arr_distribuidores) !!};
        function initialize() {

            navigator.geolocation.getCurrentPosition(function(position){
                var positionGeo = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                console.log(positionGeo)
                var map = new google.maps.Map(document.getElementById('mapa'), {
                    zoom: 14,
                    center: new google.maps.LatLng(positionGeo.lat(),positionGeo.lng()),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < window.marcadores.length; i++) {  
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(window.marcadores[i][1], window.marcadores[i][2]),
                    map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(window.marcadores[i][0]);
                        infowindow.open(map, marker);
                    }
                    })(marker, i));
                }
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</main>
@include('public.basico.footer')
@endsection