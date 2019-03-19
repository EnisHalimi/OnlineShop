@extends('layouts.app')
@section('client','active')
@section('menaxhimi','active')
@if(@auth)
@section('content')

<div class="container-fluid">

<h3 class="d-block ">Shto Klient </h3>
<hr>

                    <form method="POST" id="client_form" action="{{ route('client.store') }}">
                        @csrf
                        <div class="row ">
                                <div class="mb-3" id="map-small"></div>
                        <div class="col-md-3">
                        <h5>Të dhënat e biznesit</h5>
                        <div class="form-group row">
                            <label for="compname" class="col-md-3 col-form-label text-md-right">Emri i kompanisë</label>

                            <div class="col-md-9">
                                <input id="compname" type="text" class="form-control" name="compname" value="" required autofocus placeholder="Emri i kompanisë">
                                    <span class="compname-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="clientnr" class="col-md-3 col-form-label text-md-right">Klasifikimi</label>

                                <div class="col-md-9">
                                <select class="form-control" id="klasifikimi" name="klasifikimi">
                                          @foreach($klasifikimet as $ks)
                                            <option value="{{$ks->id}}">{{$ks->Emertimi}}</option>
                                        @endforeach
                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Adresa</label>

                                    <div class="col-md-9">
                                        <input id="address" type="text" class="form-control" name="address" value="" required autofocus placeholder="Adresa">
                                            <span class="address-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="qyteti" class="col-md-3 col-form-label text-md-right">Qyteti</label>

                                        <div class="col-md-9">
                                        <select class="form-control" id="qyteti" name="qyteti">
                                            <option>Albanik</option>
                                            <option>Artanë</option>
                                            <option>Besianë</option>
                                            <option>Dardanë</option>
                                            <option>Deçan</option>
                                            <option>Drenas</option>
                                            <option>Fushë Kosovë</option>
                                            <option>Graçanicë‎</option>
                                            <option>Gjakovë</option>
                                            <option>Gjilan</option>
                                            <option>Junik</option>
                                            <option>Istog</option>
                                            <option>Kaçanik</option>
                                            <option>Kastriot</option>
                                            <option>Klinë</option>
                                            <option>Shtërpca</option>
                                            <option>Lipjan</option>
                                            <option>Malishevë</option>
                                            <option>Mamushë‎</option>
                                            <option>Mitorvicë</option>
                                            <option>Novobërdë‎</option>
                                            <option>Partesh‎</option>
                                            <option>Podujevë‎</option>
                                            <option>Pejë</option>
                                            <option>Prizren</option>
                                            <option>Prishtinë</option>
                                            <option>Rahovec‎</option>
                                            <option>Skënderaj‎</option>
                                            <option>Shtërpcë‎</option>
                                            <option>Shtime‎</option>
                                            <option>Suharekë</option>
                                            <option>Viti‎</option>
                                            <option>Vushtrri‎</option>
                                            <option>Zubin Potok‎</option>
                                            <option>Zveçan‎</option>

                                        </select>
                                        </div>
                                    </div>

                        <div class="form-group row">
                        <label for="shteti" class="col-md-3 col-form-label text-md-right">Shteti</label>
                                <div class="col-md-9">

                                    <select class="form-control" id="shteti" name="shteti">
                                            <option>Kosova</option>
                                            <option>Shqipëria</option>
                                        </select>
                            </div>
                        </div>
                          <div class="form-group row">
                        <label for="comtel" class="col-md-3 col-form-label text-md-right">Tel</label>
                                <div class="col-md-9">
                                <input id="comtel" type="text" class="form-control" name="comtel" value="" required autofocus placeholder="Telefoni">
                                            <span class="comtel-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-9">
                                <input id="email" type="text" class="form-control" name="email" value="" required autofocus placeholder="E-Mail">
                                            <span class="email-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="nrfiskal" class="col-md-3 col-form-label text-md-right">Nr.Fiskal</label>
                                <div class="col-md-9">
                                <input id="nrfiskal" type="text" class="form-control" name="nrfiskal" value="" required autofocus placeholder="Nr.Fiskal">
                                            <span class="nrfiskal-feedback"></span>
                            </div>
                        </div>

                       <div class="form-group row">
                        <label for="nrbiznesi" class="col-md-3 col-form-label text-md-right">Nr.Biznesit</label>
                                <div class="col-md-9">
                                <input id="nrbiznesi" type="text" class="form-control" name="nrbiznesi" value="" required autofocus placeholder="Nr.Biznesit">
                                            <span class="nrbiznesi-feedback"></span>
                            </div>
                        </div>
                       <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-center">-------------------- Personi kontaktues --------------------</label>


                        </div>

                        <div class="form-group row">
                                <label for="emrimbiemri" class="col-md-3 col-form-label text-md-right">Emri & Mbiemri</label>

                                <div class="col-md-9">
                                    <input id="emrimbiemri" type="text" class="form-control" name="emrimbiemri" value="" required autofocus placeholder="Emri dhe Mbiemri">
                                        <span class="emrimbiemri-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="pozita" class="col-md-3 col-form-label text-md-right">Pozita</label>

                                    <div class="col-md-9">
                                        <input id="pozita" type="text" class="form-control" name="pozita" value="" required autofocus placeholder="Pozita">
                                            <span class="pozita-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="telpers" class="col-md-3 col-form-label text-md-right">Tel</label>

                                        <div class="col-md-9">
                                            <input id="telpers" type="text" class="form-control" name="telpers" value="" required autofocus placeholder="Telefoni">
                                                <span class="password2-feedback"></span>
                                        </div>
                                    </div>

                        <div class="form-group row">
                            <label for="emailpers" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-9">
                                    <input id="emailpers" type="text" class="form-control" name="emailpers" value="" required autofocus placeholder="E-Mail">
                                    <span class="emailpers-feedback"></span>
                            </div>
                        </div>

                       </div>

                     <div class="col-md-9">
                     <div class="row">

                       <div class="col-md-4">
                       <h5>Kushtet e biznesit</h5>
                       <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Qmimorja e Klientit</legend>
                            <div class="col-sm-6">

                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="qmimorja" id="qmimorja1" value="R" checked>
                                <label class="form-check-label" for="qmimorja1">
                                    R
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="qmimorja" id="qmimorja2" value="R1">
                                <label class="form-check-label" for="qmimorja2">
                                    R1
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="qmimorja" id="qmimorja3" value="RR">
                                <label class="form-check-label" for="qmimorja3">
                                    Pakice
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Rabati i Klientit</legend>
                            <div class="col-sm-6">
                            <div class="form-row">
                            <div class="input-group">
                                <div class="input-group-prepend">


                                </div>
                                <input id="rabati" type="number" class="form-control" name="rabati" value="" required  autofocus placeholder="Rabati">
                                    <span class="rabati-feedback"></span>

                                </div>


                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rabatibox1" id="rabatibox1" value="Midland">
                                <label class="form-check-label" for="rabatibox1">
                                    Midland
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rabatibox2" id="rabatibox2" value="Zimmermann">
                                <label class="form-check-label" for="rabatibox2">
                                Zimmermann
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rabatibox3" id="rabatibox3" value="Purflux">
                                <label class="form-check-label" for="rabatibox3">
                                    Purflux
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rabatibox4" id="rabatibox4" value="Geba">
                                <label class="form-check-label" for="rabatibox4">
                                    Geba
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                                <legend class="col-form-label col-sm-6 pt-0">Kredit Nota</legend>

                                <div class="col-md-6">
                                    <input id="kreditnota" type="number" class="form-control" name="kreditnotaV" value="" required autofocus placeholder="Kredit Nota">
                                        <span class="kreditnota-feedback"></span>
                                </div>
                            </div>
                            <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Kushtet e pagesës</legend>
                            <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kreditnota" id="kreditnota1" value="Cash" checked>
                                <label class="form-check-label" for="kreditnota1">
                                    Cash
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="kreditnota" id="kreditnota2" value="1 javë">
                                <label class="form-check-label" for="kreditnota2">
                                    1 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="kreditnota" id="kreditnota3" value="2 javë">
                                <label class="form-check-label" for="kreditnota3">
                                    2 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="kreditnota" id="kreditnota4" value="3 javë">
                                <label class="form-check-label" for="kreditnota4">
                                    3 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="kreditnota" id="kreditnota5" value="4 javë">
                                <label class="form-check-label" for="kreditnota5">
                                    4 javë
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                       </div>
                       <div class="col-md-4">
                       <h5>Produktet që blen klienti</h5>
                       <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Midland</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midland1" id="midland1" value="PKW">
                                <label class="form-check-label" for="midland1">
                                    PKW
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midland2" id="midland2" value="LKW">
                                <label class="form-check-label" for="midland2">
                                 LKW
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midland3" id="midland3" value="Transmission">
                                <label class="form-check-label" for="midland3">
                                    Transmission
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midland4" id="midland4" value="Motocycle">
                                <label class="form-check-label" for="midland4">
                                    Motorcycle
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midland5" id="midland5" value="Aditive">
                                <label class="form-check-label" for="midland5">
                                    Aditive
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Zimmermann</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermann1" id="zimmermann1" value="Frena"        >
                                <label class="form-check-label" for="zimmermann1">
                                    Frena
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermann2" id="zimmermann2" value="Frena Dores">
                                <label class="form-check-label" for="zimmermann2">
                                    Frena Dores
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermann3" id="zimmermann3" value="Diska">
                                <label class="form-check-label" for="zimmermann3">
                                    Diska
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermann4" id="zimmermann4" value="Diska Sport">
                                <label class="form-check-label" for="zimmermann4">
                                    Diska Sport
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Purflux</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purflux1" id="purflux1" value="Vaji"        >
                                <label class="form-check-label" for="purflux1">
                                    Vaji
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purflux2" id="purflux2" value="Ajri">
                                <label class="form-check-label" for="purflux2">
                                    Ajri
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purflux3" id="purflux3" value="Karburanti">
                                <label class="form-check-label" for="purflux3">
                                    Nafte/Benzine
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purflux4" id="purflux4" value="Klime">
                                <label class="form-check-label" for="purflux4">
                                    Klime
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purflux5" id="purflux5" value="Nderruesi">
                                <label class="form-check-label" for="purflux5">
                                    Ndërruesi
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Geba</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="geba1" id="geba1" value="Pompa"        >
                                <label class="form-check-label" for="geba1">
                                    Pompa
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="geba2" id="geba2" value="Rrypa">
                                <label class="form-check-label" for="geba2">
                                    Rrypa Motori
                                </label>
                                </div>

                            </div>
                            </div>
                        </fieldset>
                       </div>
                       <div class="col-md-4  ">
                       <h5>Marketingu</h5>
                       <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Midland</legend>
                            <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark1" id="midlandmark1" value="Forex"        >
                                <label class="form-check-label" for="midlandmark1">
                                    Forex
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark2" id="midlandmark2" value="Flamur">
                                <label class="form-check-label" for="midlandmark2">
                                 Flamur
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark3" id="midlandmark3" value="RaftMadh">
                                <label class="form-check-label" for="midlandmark3">
                                    Raft i madh
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark4" id="midlandmark4" value="RaftVogel">
                                <label class="form-check-label" for="midlandmark4">
                                    Raft i vogel
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark5" id="midlandmark5" value="Reklame">
                                <label class="form-check-label" for="midlandmark5">
                                    Reklame 3D
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark6" id="midlandmark6" value="PompeMan">
                                <label class="form-check-label" for="midlandmark6">
                                    Pompe Manuale
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark7" id="midlandmark7" value="PompeDig">
                                <label class="form-check-label" for="midlandmark7">
                                    Pompe Digjitale
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="midlandmark8" id="midlandmark8" value="Qader">
                                <label class="form-check-label" for="midlandmark8">
                                    Qadër
                                </label>
                                </div>

                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Zimmermann</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermannmark1" id="zimmermannmark1" value="Katalog"        >
                                <label class="form-check-label" for="zimmermannmark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermannmark2" id="zimmermannmark2" value="Zyrtare">
                                <label class="form-check-label" for="zimmermannmark2">
                                    Zyrtare
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="zimmermannmark3" id="zimmermannmark3" value="Reklame">
                                <label class="form-check-label" for="zimmermannmark3">
                                    Reklame
                                </label>
                                </div>

                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Purflux</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purfluxmark1" id="purfluxmark1" value="Katalog"        >
                                <label class="form-check-label" for="purfluxmark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purfluxmark2" id="purfluxmark2" value="Veshmbathje">
                                <label class="form-check-label" for="purfluxmark2">
                                    Veshmbathje
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purfluxmark3" id="purfluxmark3" value="Zyrtare">
                                <label class="form-check-label" for="purfluxmark3">
                                    Zyrtare
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purfluxmark4" id="purfluxmark4" value="Reklame">
                                <label class="form-check-label" for="purfluxmark4">
                                    Reklame
                                </label>
                                </div>

                            </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Geba</legend>
                            <div class="col-sm-6">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gebamark1" id="gebamark1" value="Katalog"        >
                                <label class="form-check-label" for="gebamark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gebamark2" id="gebamark2" value="Reklame">
                                <label class="form-check-label" for="gebamark2">
                                    Reklame
                                </label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                       </div>
                        </div>
                        <div class="row">

                            <input type="text" id="data" required name="location_data" hidden>

                        </div>

            </div>
                        <input id="status" type="text" class="form-control" name="status" value="1" hidden>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regjistroModal">
                                                <i class="fa fa-plus"></i> Regjistro
                                            </button>
                                            <div class="modal fade" id="regjistroModal" tabindex="-1" role="dialog" aria-labelledby="regjistroModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="regjistroModalLabel">Regjistro Përdoruesin</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            A jeni i sigurtë që doni të vazhdoni?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                            <button type="submit" form="client_form" class="btn btn-success"><i class="fa fa-plus"></i> Regjistro</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    var mymap = L.map('map-small').setView([42.599453, 20.905145], 9);

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

    function onLocationFound(e)
    {
        var radius = e.accuracy / 2;
        L.marker(e.latlng).addTo(mymap)
            .bindPopup("You are within " + radius + " meters from this point").openPopup();
        L.circle(e.latlng, radius).addTo(mymap);
            document.getElementById('data').value = e.latlng;
    }
    mymap.on('locationfound', onLocationFound);
    var markerC = true;
    function onMapClick(e) {
        document.getElementById('data').value = e.latlng;
        if(markerC)
        {
            markerC = false;
            marker = new L.marker(e.latlng, {draggable:'true'});
            marker.on('dragend', function(event)
            {
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
                marker.bindPopup("Vendoseni pikën në lokacion").openPopup();
                mymap.panTo(new L.LatLng(position.lat, position.lng))
                document.getElementById('data').value = marker.getLatLng();

            });
            mymap.addLayer(marker);
        }
    };

    mymap.on('click', onMapClick);

    var button = L.control({position: 'bottomright'});

    button.onAdd = function (mymap)
    {
        var div = L.DomUtil.create('div', 'row');
        div.innerHTML = '<button type="button" class="btn btn-light" id="location"><i class="fa fa-location-arrow"></i></button>';
        return div;
    };
    button.addTo(mymap);

    document.getElementById('location').addEventListener('click', ()=>{
        mymap.locate({setView: true, maxZoom: 16});
    });
</script>
@endsection
@else
@endif
