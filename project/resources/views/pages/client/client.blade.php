@extends('layouts.app')
@section('client','active')
@section('menaxhimi','active')

@if(@auth)
@section('content')
  <h3 class="text-left d-inline">Harta e Klientelës</h3>

  <a class="btn btn-primary d-inline float-right" href="/client/create"><i class="fa fa-plus"></i> Shto Klient</a>
  <hr>
  <div class="container-fluid mt-3" id="mapid"></div>
    <script type="text/javascript">
        var mymap = L.map('mapid').setView([42.599453, 20.905145], 9);

        var ortofoto2012 = L.tileLayer.wms('http://geoportal.rks-gov.net/wms?',{
            attribution: 'Map data &copy; <a href="https://maps.google.com/">Google Maps</a> made by <a href="https://www.startech-ks.com/">StarTech Motors</a>.',
            layers:'Orthophoto_2012,KG_DEV_WS:RoadSegment,KG_DEV_WS:Municipality,KG_DEV_WS:RoadNameView'
        }).addTo(mymap);
        var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
            attribution: 'Map data &copy; <a href="https://maps.google.com/">Google Maps</a> made by <a href="https://www.startech-ks.com/">StarTech Motors</a>.',
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        var osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
          subdomains: ['a','b','c'],
          maxZoom: 20
        });

        var baseMaps = {
            "Ortofoto 2012": ortofoto2012,
            "Google Maps": googleHybrid,
            "Open Street Map": osm
        };
        L.control.layers(baseMaps,null,{collapsed:false}).addTo(mymap);

      @foreach($klasifikimet as $klas)
        var da{{$klas->id}} = L.icon({
        iconUrl: '{{$klas->ikona}}',
        iconSize:     [20, 30]
        });
      @endforeach

      @foreach($maps as $map)
        var marker = L.marker([{{$map->Lat}}, {{$map->Lng }}], {icon: da{{$map->klasifikimiID}}}).addTo(mymap);
        marker.bindPopup( "<b>{{$map->emri_kompanise}}</b><br>{{$map->qyteti}}.<br><a href='/client/{{$map->ClientID}}'>Shiko</a>").openPopup();
      @endforeach

      var legend = L.control({position: 'topright'});

      legend.onAdd = function (mymap)
      {
        var div = L.DomUtil.create('div', 'info leaflet-control-layers leaflet-control leaflet-control-expanded '),
        labels = [];
        @foreach($klasifikimet as $klas)
          div.innerHTML +=
            '<img src="{{$klas->ikona}}" style="width: 12px; height: 20px"> <p class="align-center d-inline" style="font-size: 10pt;">{{$klas->Emertimi}}</p> @if(!$loop->last) <br>  @endif';
        @endforeach
        return div;
      };
      legend.addTo(mymap);
    </script>
@endsection
@else
@endif
