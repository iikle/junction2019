@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
<style>
  #map { height: 80%; }
</style>
<div id="map"></div>
<script>
  var mymap = L.map('map').setView([60.205, 24.806], 13);

  L.tileLayer('https://tile.openstreetmap.de/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
}).addTo(mymap);

var marker = L.marker([60.205, 24.806], {
    icon: new L.icon({iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-red.png'})
}).addTo(mymap).bindPopup("<b>Property ID:</b><br>904543-435-45<br/><b>Tehtävä:</b><br/>Lampun vaihto<br/><b>Tekijä:</b><br>Erkki Salo");
var marker1 = L.marker([60.215, 24.806]).addTo(mymap).bindPopup("<b>Tekijä:</b><br>Erkki Salo<br/>");
;
var marker2 = L.marker([60.205, 24.816]).addTo(mymap);
</script>
@endsection

@push('js')

@endpush