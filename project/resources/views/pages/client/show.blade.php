@extends('layouts.app')
@section('client','active')
@section('menaxhimi','active')
@if(@auth)
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
        <h3 class="">Të dhënat e Klientit</h3>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <a href="/client" class="btn btn-primary mr-2"  ><i class="fa fa-chevron-left"></i> Kthehu</a>
        <a href="/client/{{$client->id}}/edit" class="btn btn-success mr-2"><i class="fa fa-pencil"></i> Ndrysho</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fshijModal"><i class="fa fa-trash"></i> Fshij</button>
        <div class="modal fade" id="fshijModal" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fshijModalLabel">Fshij Klientin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        A jeni i sigurtë që doni të vazhdoni?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                        <form class="d-inline" method="POST" action="{{ route('client.destroy',$client->id)}}" accept-charset="UTF-8">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Fshij</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row">

<div class="col-md-4">
<table class="table table-striped ">

            <tbody>
                <tr>
                    <th>Emri i kompanisë:</th>
                    <td scope="row">{{$client->emri_kompanise}}</td>
                </tr>
                <tr>
                    <th>Klasifikimi:</th>
                    <td scope="row">{{App\Client::getKlasifikimi($client->klasifikimiID)}}</td>
                </tr>
                <tr>
                    <th>Adresa:</th>
                    <td scope="row">{{$client->adresa}} </td>
                </tr>
                <tr>
                    <th>Qyteti:</th>
                    <td scope="row">{{$client->qyteti}}</td>
                </tr>
                <tr>
                    <th>Shteti:</th>
                    <td scope="row">{{$client->shteti}}</td>
                </tr>
                <tr>
                    <th>Telefoni:</th>
                    <td scope="row">{{$client->tel_komp}}</td>
                </tr>
                <tr>
                    <th>E-Mail:</th>
                    <td scope="row">{{$client->email_komp}}</td>
                </tr>
                <tr>
                    <th>Nr Fiskal:</th>
                    <td scope="row">{{$client->nr_fiskal}}</td>
                </tr>
                <tr>
                    <th>Nr Biznesit:</th>
                    <td scope="row">{{$client->nr_biznesit}}</td>
                </tr>
                <tr>
                    <th> </th>
                    <td ><b>Personi Kontaktues</b></td>
                </tr>
                <tr>
                    <th>Emri Mbiemri:</th>
                    <td scope="row">{{$client->emri_mbiemri }} </td>
                </tr>
                <tr>
                    <th>Pozita:</th>
                    <td scope="row">{{$client->pozita}}</td>
                </tr>
                <tr>
                    <th>Telefoni:</th>
                    <td scope="row">{{$client->tel_pers }}</td>
                </tr>
                <tr>
                    <th>E-Mail:</th>
                    <td scope="row">{{$client->email_pers }}</td>
                </tr>
                <tr>
                    <th>Qmimorja:</th>
                    <td scope="row">{{$client->qmimorja }}</td>
                </tr>
                </tbody>
        </table>
        </div>
        <div class="col-md-4">
        <table class="table table-striped ">
            <tbody>

                <tr>
                    <th>Rabati:</th>
                    <td scope="row">{{$client->rabati_perq }} %<br>
                     <input type="checkbox" @if($client->rabati_midland) checked @endif onclick="return false;"><label class="form-check-label" > Midland</label><br>
                     <input type="checkbox" @if($client->rabati_zimmermann ) checked @endif onclick="return false;"><label class="form-check-label" > Zimmermann</label><br>
                     <input type="checkbox" @if($client->rabati_purflux ) checked @endif onclick="return false;"><label class="form-check-label" > Purflux</label><br>
                     <input type="checkbox" @if($client->rabati_geba ) checked @endif onclick="return false;"><label class="form-check-label" > Geba</label>

                    </td>
                </tr>
                <tr>
                    <th>Kredit Nota:</th>
                    <td scope="row">{{$client->kredit_nota}}</td>
                </tr>
                <tr>
                    <th>Kushtet e pageses:</th>
                    <td scope="row">{{$client->kushtet_pageses }}</td>
                </tr>
                <tr>
                    <th>Produktet Midland:</th>
                    <td>
                     <input type="checkbox" @if($client->prod_midland_pkw) checked @endif onclick="return false;"><label class="form-check-label" > PKW</label><br>
                     <input type="checkbox" @if($client->prod_midland_lkw ) checked @endif onclick="return false;"><label class="form-check-label" > LKW</label><br>
                     <input type="checkbox" @if($client->prod_midland_transm ) checked @endif onclick="return false;"><label class="form-check-label" > Transmission</label><br>
                     <input type="checkbox" @if($client->prod_midland_moto  ) checked @endif onclick="return false;"><label class="form-check-label" > Motorcycle</label><br>
                     <input type="checkbox" @if($client->prod_midland_adit ) checked @endif onclick="return false;"><label class="form-check-label" > Aditivë</label>
                    </td>
                </tr>
                <tr>
                <th>Produktet Zimmermann:</th>
                    <td>
                     <input type="checkbox" @if($client->prod_zimm_frena ) checked @endif onclick="return false;"><label class="form-check-label" >Frena</label><br>
                     <input type="checkbox" @if($client->prod_zimm_frena_dores ) checked @endif onclick="return false;"><label class="form-check-label" > Frena Dores</label><br>
                     <input type="checkbox" @if($client->prod_zimm_diska  ) checked @endif onclick="return false;"><label class="form-check-label" > Diska</label><br>
                     <input type="checkbox" @if($client->prod_zimm_diska_sport  ) checked @endif onclick="return false;"><label class="form-check-label" > Diska Sport</label>
                    </td>
                </tr>
                <tr>
                    <th>Produktet Purflux:</th>
                    <td>
                     <input type="checkbox" @if($client->prod_purf_vaji ) checked @endif onclick="return false;"><label class="form-check-label" > Vaji</label><br>
                     <input type="checkbox" @if($client->prod_purf_ajri  ) checked @endif onclick="return false;"><label class="form-check-label" > Ajri</label><br>
                     <input type="checkbox" @if($client->prod_purf_karb  ) checked @endif onclick="return false;"><label class="form-check-label" > Karburanti</label><br>
                     <input type="checkbox" @if($client->prod_purf_klime   ) checked @endif onclick="return false;"><label class="form-check-label" > Klime</label><br>
                     <input type="checkbox" @if($client->prod_purf_nderr  ) checked @endif onclick="return false;"><label class="form-check-label" > Ndërruesi</label>
                    </td>
                </tr>
                <tr>
                    <th>Produktet Geba:</th>
                    <td>
                     <input type="checkbox" @if($client->prod_geba_pomp  ) checked @endif onclick="return false;"><label class="form-check-label" > Pomp uji</label><br>
                     <input type="checkbox" @if($client->prod_geba_rryp   ) checked @endif onclick="return false;"><label class="form-check-label" > Rryp motori</label>
                    </td>
                </tr>
                </tbody>
        </table>
        </div>
        <div class="col-md-4">
        <table class="table table-striped ">
            <tbody>
                <tr>
                    <th>Marketing Midland:</th>
                    <td>
                     <input type="checkbox" @if($client->mark_midland_forex) checked @endif onclick="return false;"><label class="form-check-label" > Forex</label><br>
                     <input type="checkbox" @if($client->mark_midland_flamur) checked @endif onclick="return false;"><label class="form-check-label" > Flamur</label><br>
                     <input type="checkbox" @if($client->mark_midland_raft_m ) checked @endif onclick="return false;"><label class="form-check-label" > Raft i madh</label><br>
                     <input type="checkbox" @if($client->mark_midland_raft_v   ) checked @endif onclick="return false;"><label class="form-check-label" > Raft i vogel</label><br>
                     <input type="checkbox" @if($client->mark_midland_reklame ) checked @endif onclick="return false;"><label class="form-check-label" > Reklame</label><br>
                     <input type="checkbox" @if($client->mark_midland_pomp_m ) checked @endif onclick="return false;"><label class="form-check-label" >Pomp manuale</label><br>
                     <input type="checkbox" @if($client->mark_midland_pomp_d    ) checked @endif onclick="return false;"><label class="form-check-label" >Pomp digjitale</label><br>
                     <input type="checkbox" @if($client->mark_midland_qader   ) checked @endif onclick="return false;"><label class="form-check-label" > Qader</label>
                    </td>

                </tr>
                <tr>
                <th>Marketing Zimmermann:</th>
                    <td>
                     <input type="checkbox" @if($client->mark_zimm_katalog  ) checked @endif onclick="return false;"><label class="form-check-label" >Katalog</label><br>
                     <input type="checkbox" @if($client->mark_zimm_zyrt  ) checked @endif onclick="return false;"><label class="form-check-label" > Zyrtare</label><br>
                     <input type="checkbox" @if($client->mark_zimm_reklam   ) checked @endif onclick="return false;"><label class="form-check-label" > Reklame</label>
                    </td>
                </tr>
                <tr>
                    <th>Marketing Purflux:</th>
                    <td>
                     <input type="checkbox" @if($client->mark_purf_katalog  ) checked @endif onclick="return false;"><label class="form-check-label" > Katalog</label><br>
                     <input type="checkbox" @if($client->mark_purf_veshmb   ) checked @endif onclick="return false;"><label class="form-check-label" > Veshmbathje</label><br>
                     <input type="checkbox" @if($client->mark_purf_zyrt   ) checked @endif onclick="return false;"><label class="form-check-label" > Zyrtare</label><br>
                     <input type="checkbox" @if($client->mark_purf_reklam    ) checked @endif onclick="return false;"><label class="form-check-label" > Reklame</label>
                    </td>
                </tr>
                <tr>
                    <th>Marketing Geba:</th>
                    <td>
                     <input type="checkbox" @if($client->mark_geba_katalog  ) checked @endif onclick="return false;"><label class="form-check-label" > Katalog</label><br>
                     <input type="checkbox" @if($client->mark_geba_reklam    ) checked @endif onclick="return false;"><label class="form-check-label" > Reklame</label>
                    </td>
                </tr>
                </tbody>
        </table>
        <div id="map-small"  style="width: 100%; height: 50%"></div>
        </div>
</div>

</div>
<script type="text/javascript">
    var mymap = L.map('map-small').setView([{{$location->Lat}}, {{$location->Lng}}], 9);

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

    @foreach($klasifikimet as $klas)
        var da{{$klas->id}} = L.icon({
        iconUrl: '{{$klas->ikona}}',
        iconSize:     [20, 30]
        });
      @endforeach

    var marker = L.marker([{{$location->Lat}}, {{$location->Lng }}], {icon: da{{$client->klasifikimiID}}}).addTo(mymap);
        marker.bindPopup( "<b>{{$client->emri_kompanise}}</b><br>{{$client->qyteti}}.").openPopup();
</script>
@endsection
@else
@endif
