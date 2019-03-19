@extends('layouts.app')
@section('client','active')
@section('menaxhimi','active')
@if(@auth)
@section('content')

<div class="container-fluid">

<h3 class="d-block">Ndrysho Klientin {{$client->emri_kompanise}} </h3>
<hr>
                    <form method="POST" id="client_form" action="{{ route('client.update',$client->id) }}">
                            @method('PUT')
                        @csrf
                        <div class="row">
                                <div class="mb-3" id="map-small"></div>
                        <div class="col-md-3">
                        <h5>Të dhënat e biznesit</h5>
                        <div class="form-group row">
                            <label for="compname" class="col-md-3 col-form-label text-md-right">Emri i kompanisë</label>

                            <div class="col-md-9">
                                <input id="compname" type="text" class="form-control" name="compname" value=" {{$client->emri_kompanise}}" required autofocus placeholder="Emri i kompanisë">
                                    <span class="compname-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="clientnr" class="col-md-3 col-form-label text-md-right">Klasifikimi</label>

                                <div class="col-md-9">
                                    <select class="form-control" id="klasifikimi" name="klasifikimi">
                                        @foreach($klasifikimet as $ks)
                                            <option @if($client->klasifikimiID == $ks->id) selected="" @endif value="{{$ks->id}}" >{{$ks->Emertimi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="address" class="col-md-3 col-form-label text-md-right">Adresa</label>

                                    <div class="col-md-9">
                                        <input id="address" type="text" class="form-control" name="address" value="{{$client->adresa}}" required autofocus placeholder="Adresa">
                                            <span class="address-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="qyteti" class="col-md-3 col-form-label text-md-right">Qyteti</label>

                                        <div class="col-md-9">
                                        <select class="form-control" id="qyteti" name="qyteti">
                                            <option @if($client->qyteti == "Albanik") selected="" @endif>Albanik</option>
                                            <option @if($client->qyteti == "Artanë") selected="" @endif>Artanë</option>
                                            <option @if($client->qyteti == "Besianë") selected="" @endif>Besianë</option>
                                            <option @if($client->qyteti == "Dardanë") selected="" @endif>Dardanë</option>
                                            <option @if($client->qyteti == "Deçan") selected="" @endif>Deçan</option>
                                            <option @if($client->qyteti == "Drenas") selected="" @endif>Drenas</option>
                                            <option @if($client->qyteti == "Fushë Kosovë") selected="" @endif>Fushë Kosovë</option>
                                            <option @if($client->qyteti == "Graçanicë‎") selected="" @endif>Graçanicë‎</option>
                                            <option @if($client->qyteti == "Gjakovë") selected="" @endif>Gjakovë</option>
                                            <option @if($client->qyteti == "Gjilan") selected="" @endif>Gjilan</option>
                                            <option @if($client->qyteti == "Junik") selected="" @endif>Junik</option>
                                            <option @if($client->qyteti == "Istog") selected="" @endif>Istog</option>
                                            <option @if($client->qyteti == "Kaçanik") selected="" @endif>Kaçanik</option>
                                            <option @if($client->qyteti == "Kastriot") selected="" @endif>Kastriot</option>
                                            <option @if($client->qyteti == "Klinë") selected="" @endif>Klinë</option>
                                            <option @if($client->qyteti == "Shtërpca") selected="" @endif>Shtërpca</option>
                                            <option @if($client->qyteti == "Lipjan") selected="" @endif>Lipjan</option>
                                            <option @if($client->qyteti == "Malishevë") selected="" @endif>Malishevë</option>
                                            <option @if($client->qyteti == "Mamushë‎") selected="" @endif>Mamushë‎</option>
                                            <option @if($client->qyteti == "Mitorvicë") selected="" @endif>Mitorvicë</option>
                                            <option @if($client->qyteti == "Novobërdë‎") selected="" @endif>Novobërdë‎</option>
                                            <option @if($client->qyteti == "Partesh‎") selected="" @endif>Partesh‎</option>
                                            <option @if($client->qyteti == "Partesh‎") selected="" @endif>Partesh‎</option>
                                            <option @if($client->qyteti == "Pejë") selected="" @endif>Pejë</option>
                                            <option @if($client->qyteti == "Prizren") selected="" @endif>Prizren</option>
                                            <option @if($client->qyteti == "Prishtinë") selected="" @endif>Prishtinë</option>
                                            <option @if($client->qyteti == "Rahovec‎") selected="" @endif>Rahovec‎</option>
                                            <option @if($client->qyteti == "Skënderaj‎") selected="" @endif>Skënderaj‎</option>
                                            <option @if($client->qyteti == "Shtërpcë‎") selected="" @endif>Shtërpcë‎</option>
                                            <option @if($client->qyteti == "Shtime‎") selected="" @endif>Shtime‎</option>
                                            <option @if($client->qyteti == "Suharekë") selected="" @endif>Suharekë</option>
                                            <option @if($client->qyteti == "Viti‎") selected="" @endif>Viti‎</option>
                                            <option @if($client->qyteti == "Vushtrri‎") selected="" @endif>Vushtrri‎</option>
                                            <option @if($client->qyteti == "Zubin Potok") selected="" @endif>Zubin Potok‎</option>
                                            <option @if($client->qyteti == "Zveçan‎") selected="" @endif>Zveçan‎</option>

                                        </select>
                                        </div>
                                    </div>

                        <div class="form-group row">
                        <label for="shteti" class="col-md-3 col-form-label text-md-right">Shteti</label>
                                <div class="col-md-9">

                                    <select class="form-control" id="shteti" name="shteti">
                                            <option @if($client->shteti == "Kosova") selected="" @endif>Kosova</option>
                                            <option @if($client->shteti == "Shqipëria") selected="" @endif>Shqipëria</option>
                                        </select>
                            </div>
                        </div>
                          <div class="form-group row">
                        <label for="comtel" class="col-md-3 col-form-label text-md-right">Tel</label>
                                <div class="col-md-9">
                                <input id="comtel" type="text" class="form-control" name="comtel" value="{{$client->tel_komp}}" required autofocus placeholder="Telefoni">
                                            <span class="comtel-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-9">
                                <input id="email" type="text" class="form-control" name="email" value="{{$client->email_komp}}" required autofocus placeholder="E-Mail">
                                            <span class="email-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="nrfiskal" class="col-md-3 col-form-label text-md-right">Nr.Fiskal</label>
                                <div class="col-md-9">
                                <input id="nrfiskal" type="text" class="form-control" name="nrfiskal" value="{{$client->nr_fiskal}}" required autofocus placeholder="Nr.Fiskal">
                                            <span class="nrfiskal-feedback"></span>
                            </div>
                        </div>

                       <div class="form-group row">
                        <label for="nrbiznesi" class="col-md-3 col-form-label text-md-right">Nr.Biznesit</label>
                                <div class="col-md-9">
                                <input id="nrbiznesi" type="text" class="form-control" name="nrbiznesi" value="{{$client->nr_biznesit}}" required autofocus placeholder="Nr.Biznesit">
                                            <span class="nrbiznesi-feedback"></span>
                            </div>
                        </div>
                       <div class="form-group row">
                            <label  class="col-md-12 col-form-label text-md-center">-------------------- Personi kontaktues --------------------</label>


                        </div>

                        <div class="form-group row">
                                <label for="emrimbiemri" class="col-md-3 col-form-label text-md-right">Emri & Mbiemri</label>

                                <div class="col-md-9">
                                    <input id="emrimbiemri" type="text" class="form-control" name="emrimbiemri" value="{{$client->emri_mbiemri }}" required autofocus placeholder="Emri dhe Mbiemri">
                                        <span class="emrimbiemri-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="pozita" class="col-md-3 col-form-label text-md-right">Pozita</label>

                                    <div class="col-md-9">
                                        <input id="pozita" type="text" class="form-control" name="pozita" value="{{$client->pozita}}" required autofocus placeholder="Pozita">
                                            <span class="pozita-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="telpers" class="col-md-3 col-form-label text-md-right">Tel</label>

                                        <div class="col-md-9">
                                            <input id="telpers" type="text" class="form-control" name="telpers" value="{{$client->tel_pers }}" required autofocus placeholder="Telefoni">
                                                <span class="password2-feedback"></span>
                                        </div>
                                    </div>

                        <div class="form-group row">
                            <label for="emailpers" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-9">
                                    <input id="emailpers" type="text" class="form-control" name="emailpers" value="{{$client->email_pers }}" required autofocus placeholder="E-Mail">
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
                                <input class="form-check-input" type="radio" @if($client->qmimorja === "R") checked @endif name="qmimorja" id="qmimorja1" value="R" checked>
                                <label class="form-check-label" for="qmimorja1">
                                    R
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->qmimorja === "R1") checked @endif name="qmimorja" id="qmimorja2" value="R1">
                                <label class="form-check-label" for="qmimorja2">
                                    R1
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->qmimorja === "Pakic") checked @endif name="qmimorja" id="qmimorja3" value="Pakic">
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
                                <input id="rabati" type="number" class="form-control" name="rabati" value="{{$client->rabati_perq }}" required  autofocus placeholder="Rabati">
                                    <span class="rabati-feedback"></span>

                                </div>


                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->rabati_midland) checked @endif type="checkbox" name="rabatibox1" id="rabatibox1" value="Midland">
                                <label class="form-check-label" for="rabatibox1">
                                    Midland
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->rabati_zimmermann) checked @endif type="checkbox" name="rabatibox2" id="rabatibox2" value="Zimmermann">
                                <label class="form-check-label" for="rabatibox2">
                                Zimmermann
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->rabati_purflux) checked @endif type="checkbox" name="rabatibox3" id="rabatibox3" value="Purflux">
                                <label class="form-check-label" for="rabatibox3">
                                    Purflux
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->rabati_geba) checked @endif type="checkbox" name="rabatibox4" id="rabatibox4" value="Geba">
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
                                    <input id="kreditnota" type="number" class="form-control" name="kreditnotaV" value="{{$client->kredit_nota}}" required autofocus placeholder="Kredit Nota">
                                        <span class="kreditnota-feedback"></span>
                                </div>
                            </div>
                            <fieldset class="form-group">
                            <div class="row">
                            <legend class="col-form-label col-sm-6 pt-0">Kushtet e pagesës</legend>
                            <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->kushtet_pageses == "Cash") checked @endif name="kreditnota" id="kreditnota1" value="Cash" checked>
                                <label class="form-check-label" for="kreditnota1">
                                    Cash
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->kushtet_pageses == "1 javë") checked @endif  name="kreditnota" id="kreditnota2" value="1 javë">
                                <label class="form-check-label" for="kreditnota2">
                                    1 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->kushtet_pageses == "2 javë") checked @endif  name="kreditnota" id="kreditnota3" value="2 javë">
                                <label class="form-check-label" for="kreditnota3">
                                    2 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio"  @if($client->kushtet_pageses == "3 javë") checked @endif name="kreditnota" id="kreditnota4" value="3 javë">
                                <label class="form-check-label" for="kreditnota4">
                                    3 javë
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" @if($client->kushtet_pageses == "4 javë") checked @endif name="kreditnota" id="kreditnota5" value="4 javë">
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
                                <input class="form-check-input" @if($client->prod_midland_pkw) checked @endif  type="checkbox" name="midland1" id="midland1" value="PKW">
                                <label class="form-check-label" for="midland1">
                                    PKW
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_midland_lkw) checked @endif  type="checkbox" name="midland2" id="midland2" value="LKW">
                                <label class="form-check-label" for="midland2">
                                 LKW
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_midland_transm) checked @endif  type="checkbox" name="midland3" id="midland3" value="Transmission">
                                <label class="form-check-label" for="midland3">
                                    Transmission
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_midland_moto) checked @endif type="checkbox" name="midland4" id="midland4" value="Motocycle">
                                <label class="form-check-label" for="midland4">
                                    Motorcycle
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_midland_adit) checked @endif type="checkbox" name="midland5" id="midland5" value="Aditive">
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
                                <input class="form-check-input" @if($client->prod_zimm_frena ) checked @endif type="checkbox" name="zimmermann1" id="zimmermann1" value="Frena"        >
                                <label class="form-check-label" for="zimmermann1">
                                    Frena
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_zimm_frena_dores ) checked @endif type="checkbox" name="zimmermann2" id="zimmermann2" value="Frena Dores">
                                <label class="form-check-label" for="zimmermann2">
                                    Frena Dores
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_zimm_diska ) checked @endif type="checkbox" name="zimmermann3" id="zimmermann3" value="Diska">
                                <label class="form-check-label" for="zimmermann3">
                                    Diska
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_zimm_diska_sport ) checked @endif type="checkbox" name="zimmermann4" id="zimmermann4" value="Diska Sport">
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
                                <input class="form-check-input" @if($client->prod_purf_vaji ) checked @endif type="checkbox" name="purflux1" id="purflux1" value="Vaji"        >
                                <label class="form-check-label" for="purflux1">
                                    Vaji
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_purf_ajri ) checked @endif type="checkbox" name="purflux2" id="purflux2" value="Ajri">
                                <label class="form-check-label" for="purflux2">
                                    Ajri
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_purf_karb ) checked @endif type="checkbox" name="purflux3" id="purflux3" value="Karburanti">
                                <label class="form-check-label" for="purflux3">
                                    Nafte/Benzine
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_purf_klime ) checked @endif type="checkbox" name="purflux4" id="purflux4" value="Klime">
                                <label class="form-check-label" for="purflux4">
                                    Klime
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->prod_purf_nderr ) checked @endif type="checkbox" name="purflux5" id="purflux5" value="Nderruesi">
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
                                <input class="form-check-input"  @if($client->prod_geba_pomp  ) checked @endif type="checkbox" name="geba1" id="geba1" value="Pompa"        >
                                <label class="form-check-label" for="geba1">
                                    Pompa
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input"  @if($client->prod_geba_rryp  ) checked @endif type="checkbox" name="geba2" id="geba2" value="Rrypa">
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
                                <input class="form-check-input" @if($client->mark_midland_forex) checked @endif type="checkbox" name="midlandmark1" id="midlandmark1" value="Forex"        >
                                <label class="form-check-label" for="midlandmark1">
                                    Forex
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_flamur) checked @endif type="checkbox" name="midlandmark2" id="midlandmark2" value="Flamur">
                                <label class="form-check-label" for="midlandmark2">
                                 Flamur
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_raft_m) checked @endif type="checkbox" name="midlandmark3" id="midlandmark3" value="RaftMadh">
                                <label class="form-check-label" for="midlandmark3">
                                    Raft i madh
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_raft_v) checked @endif type="checkbox" name="midlandmark4" id="midlandmark4" value="RaftVogel">
                                <label class="form-check-label" for="midlandmark4">
                                    Raft i vogel
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_reklame) checked @endif  type="checkbox" name="midlandmark5" id="midlandmark5" value="Reklame">
                                <label class="form-check-label" for="midlandmark5">
                                    Reklame 3D
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_pomp_m) checked @endif type="checkbox" name="midlandmark6" id="midlandmark6" value="PompeMan">
                                <label class="form-check-label" for="midlandmark6">
                                    Pompe Manuale
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_pomp_d) checked @endif type="checkbox" name="midlandmark7" id="midlandmark7" value="PompeDig">
                                <label class="form-check-label" for="midlandmark7">
                                    Pompe Digjitale
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_midland_qader) checked @endif type="checkbox" name="midlandmark8" id="midlandmark8" value="Qader">
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
                                <input class="form-check-input" @if($client->mark_zimm_katalog  ) checked @endif type="checkbox" name="zimmermannmark1" id="zimmermannmark1" value="Katalog"        >
                                <label class="form-check-label" for="zimmermannmark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_zimm_zyrt   ) checked @endif type="checkbox" name="zimmermannmark2" id="zimmermannmark2" value="Zyrtare">
                                <label class="form-check-label" for="zimmermannmark2">
                                    Zyrtare
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_zimm_reklam  ) checked @endif type="checkbox" name="zimmermannmark3" id="zimmermannmark3" value="Reklame">
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
                                <input class="form-check-input" @if($client->mark_purf_katalog) checked @endif type="checkbox" name="purfluxmark1" id="purfluxmark1" value="Katalog"        >
                                <label class="form-check-label" for="purfluxmark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_purf_veshmb) checked @endif type="checkbox" name="purfluxmark2" id="purfluxmark2" value="Veshmbathje">
                                <label class="form-check-label" for="purfluxmark2">
                                    Veshmbathje
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_purf_zyrt) checked @endif type="checkbox" name="purfluxmark3" id="purfluxmark3" value="Zyrtare">
                                <label class="form-check-label" for="purfluxmark3">
                                    Zyrtare
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" @if($client->mark_purf_reklam) checked @endif type="checkbox" name="purfluxmark4" id="purfluxmark4" value="Reklame">
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
                                <input class="form-check-input"  @if($client->mark_geba_katalog) checked @endif type="checkbox" name="gebamark1" id="gebamark1" value="Katalog"        >
                                <label class="form-check-label" for="gebamark1">
                                    Katalog
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input"  @if($client->mark_geba_reklam) checked @endif type="checkbox" name="gebamark2" id="gebamark2" value="Reklame">
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

                        <input type="text" id="data" required hidden name="location_data" value="LatLng({{$location->Lat}},{{$location->Lng}})" >

                        </div>
            </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-5"><a href="{{ url()->previous() }}" class="btn btn-primary "><i class="fa fa-chevron-left"></i> Kthehu</a>
                                </div>

                                <div class="col-md-6 ">

                                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ndryshoModal">
                                                <i class="fa fa-pencil"></i> Ndrysho
                                            </button>
                                            <div class="modal fade" id="ndryshoModal" tabindex="-1" role="dialog" aria-labelledby="ndryshoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ndryshoModalLabel">Ndrysho Klientin</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            A jeni i sigurtë që doni të vazhdoni?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                            <button type="submit" form="client_form" class="btn btn-success"><i class="fa fa-pencil"></i> Ndrysho</button>
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



    @foreach($klasifikimet as $klas)
        var da{{$klas->id}} = L.icon({
        iconUrl: '{{$klas->ikona}}',
        iconSize:     [20, 30]
        });
      @endforeach

    var marker =  L.marker([{{$location->Lat}}, {{$location->Lng }}],{draggable:'true'} ,{icon: da{{$client->klasifikimiID}}},).addTo(mymap);
    marker.bindPopup( "<b>{{$client->emri_kompanise}}</b><br>{{$client->qyteti}}.<br><a href='/client/{{$client->id }}'>Shiko</a>").openPopup();
    marker.on('dragend', function(event)
        {
            var marker = event.target;
            var position = marker.getLatLng();
            marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
            marker.bindPopup("Vendoseni pikën në lokacion").openPopup();
            mymap.panTo(new L.LatLng(position.lat, position.lng))
            document.getElementById('data').value = marker.getLatLng();
        });

    function onLocationFound(e)
    {
        var radius = e.accuracy / 2;
        marker.setLatLng(e.latlng)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();
        L.circle(e.latlng, radius).addTo(mymap);
        document.getElementById('data').value = e.latlng;
    }
    mymap.on('locationfound', onLocationFound);

    function onMapClick(e) {
        document.getElementById('data').value = e.latlng;
        marker.setLatLng(e.latlng);
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
