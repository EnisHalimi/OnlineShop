@extends('layouts.app')
@section('home','active')

@if(@auth)
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-2 ml-1 ">
            <div class="row" id="search-container">
                <div class="row w-100 d-flex justify-content-center">
                    <form  action="{{ url('product') }}" autocomplete="off">
                <div class="form-group auto">
                    <input class="form-control" type="text" autocomplete="off" required value="{{$keyword}}" name="search" id="search" placeholder="Kerko"/>
                                           
                    
                    </div>
                    <div class="form-group d-flex  justify-content-center"> 
                        <label class="radio-inline mr-3 "><input type="radio" value="oe"  name="searchcriteria" id="search-criteria" > OE Nr</label>  
                        <label class="radio-inline mr-3 "><input type="radio" value="code" name="searchcriteria" id="search-criteria" > Kodi</label>    
                    </div>
                    <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Kërko</button>
                    </div>
                </form>
            </div>
              
                <div class="row w-100 ">
                    <div class="panel-group w-100 border-bottom  mb-2">
                        <form action="{{ url('aksionet') }}">
                            <input type="text" name="tipi" value="1" hidden/>
                             <button style="white-space: normal;"  class="btn btn-light list-group-item w-100 text-left" type="submit">Artikujt ne aksion</button>
                        </form>
                        <form action="{{ url('aksionet') }}">
                                <input type="text" name="tipi" value="2" hidden/>
                               <button style="white-space: normal;" class="btn btn-light list-group-item w-100 text-left" type="submit">Artikujt e ri</button>
                        </form>
                        <form action="{{ url('aksionet') }}">
                                <input type="text" name="tipi" value="3" hidden/>
                                <button style="white-space: normal;"  class="btn btn-light list-group-item w-100 text-left" type="submit">Artikujt e rekomanduar</button>
                        </form>
                    </div>
                    <div class="panel-group w-100 ">
                        <div class="panel panel-default ">
                            <div class="panel-heading  ">
                                <h5 class="panel-title">
                                    <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" onclick="changeState(this);" href="#collapse1">Brendi</button>
                                </h5>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">    
                                <div class="panel-body">
                                <ul class="list-unstyled mx-2">
                                     <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Midland" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Midland</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Zimmermann" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Zimmermann</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="ATE" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">ATE</button>
                                        </form>
                                    </li>
                                    <li>
                                            <form action="{{ url('customSearch') }}">
                                                <input type="text" name="search" value="Fremax" hidden/>
                                                <input type="text" name="tipi" value="1" hidden/>
                                                 <button class="btn btn-light text-left list-group-item w-100" type="submit">Fremax</button>
                                            </form>
                                        </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Purflux" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Purflux</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Vaico" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Vaico</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Mann" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Mann</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Filtron" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Filtron</button>
                                        </form>
                                    </li>
									<li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="JCPremium" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">JC Premium</button>
                                        </form>
                                    </li>
                                    <li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Geba" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Geba</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="INNA" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Ina</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Contitech" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Continental</button>
                                        </form>
                                    </li>
                                    
                                    <li>
                                            <form action="{{ url('customSearch') }}">
                                                <input type="text" name="search" value="Cartechnic" hidden/>
                                                <input type="text" name="tipi" value="1" hidden/>
                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Cartechnic</button>
                                            </form>
                                        </li>
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="OSRAM" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">OSRAM</button>
                                        </form>
                                    </li>
                                    
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Mammooth" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Mammooth</button>
                                        </form>
                                    </li>  
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Febi" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Febi Bilstein</button>
                                        </form>
                                    </li> 
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="LiquiMoly" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">LiquiMoly</button>
                                        </form>
                                    </li> 
                                    <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="4Max" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">4Max</button>
                                        </form>
                                    </li>
									 <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Profitool" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Profitool</button>
                                        </form>
                                    </li> 
									 <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Knecht" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Knecht</button>
                                        </form>
                                    </li> 
									 <li>
                                        <form action="{{ url('customSearch') }}">
                                            <input type="text" name="search" value="Profirs" hidden/>
                                            <input type="text" name="tipi" value="1" hidden/>
                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Profirs</button>
                                        </form>
                                    </li> 						
                                </ul>
                                </div>
                                    <div class="panel-footer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group w-100 ">
                        <div class="panel panel-default ">
                            <div class="panel-heading ">
                                <h5 class="panel-title">
                                    <button class="list-group-item bg-light w-100 text-left"   data-toggle="collapse" href="#collapse2">Vajra</button>
                                </h5>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                        <ul class="list-unstyled mx-2">
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="PKV" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">PKV</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="LKV" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">LKV</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Transmission" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Transmission</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Hydraulic" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Hydraulic</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Motorcycle" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Motorcycle</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Industry" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Industry</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Aditiv" hidden/>
                                                    <input type="text" name="tipi" value="2" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Aditiv</button>
                                                </form>
                                            </li>
                                        </ul>
                                </div>
                                    <div class="panel-footer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group w-100 ">
                            <div class="panel panel-default ">
                                <div class="panel-heading ">
                                    <h5 class="panel-title">
                                        <button class="list-group-item bg-light w-100 text-left"   data-toggle="collapse" href="#collapse3">Disqe</button>
                                    </h5>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                            <ul class="list-unstyled mx-2">
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Para" hidden/>
                                                            <input type="text" name="tipi" value="3" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Para</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Mrapa" hidden/>
                                                            <input type="text" name="tipi" value="3" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Mrapa</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Sport Para" hidden/>
                                                            <input type="text" name="tipi" value="3" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Sport Para</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Sport Mrapa" hidden/>
                                                            <input type="text" name="tipi" value="3" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Sport Mrapa</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                    </div>
                                        <div class="panel-footer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group w-100 ">
                                <div class="panel panel-default ">
                                    <div class="panel-heading ">
                                        <h5 class="panel-title">
                                            <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" href="#collapse4">Frena</button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                                <ul class="list-unstyled mx-2">
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Para" hidden/>
                                                            <input type="text" name="tipi" value="4" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Para</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Mrapa" hidden/>
                                                            <input type="text" name="tipi" value="4" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Mrapa</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                        </div>
                                            <div class="panel-footer"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="panel-group w-100 ">
                            <div class="panel panel-default ">
                                <div class="panel-heading ">
                                    <h5 class="panel-title">
                                        <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" href="#collapse5">Filtra</button>
                                    </h5>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                            <ul class="list-unstyled mx-2">
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Ajri" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Ajri</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Vaji" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Vaji</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Nafte" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Nafte</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Benzin" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Karburanti</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Klime" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Klime</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Nderruesi" hidden/>
                                                        <input type="text" name="tipi" value="5" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Ndërruesi</button>
                                                    </form>
                                                </li>

                                                </ul>
                                    </div>
                                        <div class="panel-footer"></div>
                                </div>
                            </div>
                        <div class="panel-group w-100 ">
                                <div class="panel panel-default ">
                                    <div class="panel-heading ">
                                        <h5 class="panel-title">
                                            <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" href="#collapse6">Pompa Uji</button>
                                        </h5>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                                <ul class="list-unstyled mx-2">
												<li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="PumpaUji" hidden/>
                                                        <input type="text" name="tipi" value="7" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Pompa Uji</button>
                                                    </form>
                                                </li>
                                                   
                                                    </ul>
                                        </div>
                                            <div class="panel-footer"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="panel-group w-100 ">
                            <div class="panel panel-default ">
                                <div class="panel-heading ">
                                    <h5 class="panel-title">
                                        <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" href="#collapse7">Rryp Motori</button>
                                    </h5>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                            <ul class="list-unstyled mx-2">
                                                <li>
                                                    <form action="{{ url('customSearch') }}">
                                                        <input type="text" name="search" value="Rrypa" hidden/>
                                                        <input type="text" name="tipi" value="7" hidden/>
                                                        <button class="btn btn-light text-left list-group-item w-100" type="submit">Rrypa Motori</button>
                                                    </form>
                                                </li>
                                                
                                                </ul>
                                    </div>
                                        <div class="panel-footer"></div>
                                </div>
                            </div>
                    </div>
                    <div class="panel-group w-100 ">
                        <div class="panel panel-default ">
                            <div class="panel-heading ">
                                <h5 class="panel-title">
                                    <button class="list-group-item bg-light w-100 text-left"  data-toggle="collapse" href="#collapse8">Të tjera</button>
                                </h5>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                        <ul class="list-unstyled mx-2">
										 <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Xenon" hidden/>
                                                            <input type="text" name="tipi" value="6" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Drite Xenon</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('customSearch') }}">
                                                            <input type="text" name="search" value="Halogen" hidden/>
                                                            <input type="text" name="tipi" value="6" hidden/>
                                                            <button class="btn btn-light text-left list-group-item w-100" type="submit">Drite Halogen</button>
                                                        </form>
                                                    </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="KablloStartuese" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Kabllo Startuese</button>
                                                </form>
                                            </li>
											<li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Paste" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Paste për duar</button>
                                                </form>
                                            </li>
											<li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Ene" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Enë për vaj</button>
                                                </form>
                                            </li>
											<li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="kepuce" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Këpucë pune</button>
                                                </form>
                                            </li>
											<li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="mbulese" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Mbulesë veture</button>
                                                </form>
                                            </li>
											<li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="uje" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Ujë për xhama</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Zingjire" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Zingjire</button>
                                                </form>
                                            </li>                                          
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Akumlatore" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Akumlatorë</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('customSearch') }}">
                                                    <input type="text" name="search" value="Fshesa" hidden/>
                                                    <input type="text" name="tipi" value="8" hidden/>
                                                    <button class="btn btn-light text-left list-group-item w-100" type="submit">Fshesa</button>
                                                </form>
                                            </li>
                                            </ul>
                                </div>
                                    <div class="panel-footer"></div>
                            </div>
                        </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        <div class="container-fluid m-0">
            <div class="row">
                <div class="panel">
                    @if($keyword !== '')
                <h4>Rezultatet e Kërkimit {{$keyword}}</h4>
                @else
                    <h4>Produktet</h4>
                    @endif  
                </div>
            </div>
           <div class="row">
                <div class="col-md-3 d-none d-md-block">
                 <!-- <select class="form-control" id="sel1">
                        <option>Brendi</option>
                        <option value="Midland">Midland</option>
                        <option value="Zimmermann">Zimmermann</option>
                        <option value="ATE">ATE</option>
                        <option value="Fremax">Fremax</option>
                        <option value="Purflux">Purflux</option>
                        <option value="Mann">Mann</option>
                        <option value="Filtron">Filtron</option>
                        <option value="Vaico">Vaico</option>
                        <option value="Geba">Geba</option>
                        <option value="Inna">Inna</option>
                        <option value="Contitech">Continental</option>
                        <option value="Cartechnic">Cartechnic</option>
                        <option value="OSRAM">OSRAM</option>
                        <option value="Mammooth">Mammooth</option>
                    </select>--> 
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                  
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-2">
                    <div class="btn-group">
                        <button type="button"  id="card-view-toggle"  class="btn btn-primary"><i class="fa fa-th"></i> </button>
                        <button type="button"   id="table-view-toggle"  class="btn btn-primary" disabled><i class="fa fa-list-ul"></i> </button>
                    </div>
                </div>
            </div>
            <div class="row mt-3 ">
                <table id="products" class="table table-hover table-bordered">
                    <thead class="bg-dark text-light ">
                        <tr>
                            <th scope="col">Barkodi</th>
                            <th scope="col">Emërtimi</th>
                            <th id="specifika" scope="col">Specifika</th>
                            <th scope="col">Qmimi</th>
                            <th scope="col">Sasia</th>
                            <th scope="col">Shporta</th>
                        </tr>
                    </thead>
                    <tbody >
                        @if(count($products) > 0)
                            @foreach($products as $product)                 
                            <tr>
                                <td>
                                    @if(App\Aksionet::getAksion($product->ID)== 1 && App\Aksionet::getAksionQmimorja($product->ID) == Auth::user()->qmimorja)       
                                        <img id="table-label" class="d-block" src="{{asset('images/aksion.png')}}">
                                    @elseif(App\Aksionet::getAksionNew($product->ID)== true)
                                        <img id="table-label" class="d-block"  src="{{asset('images/new.png')}}">         
                                    @elseif(App\Aksionet::getAksion($product->ID)== 3)
                                        <img id="table-label"  class="d-block"  src="{{asset('images/top.png')}}">        
                                    @else
                                    @endif
                                    {{$product->Barcode}}
                                </td>
                                <td>{{App\Product::getProducer($product->ID)}} {{$product->Emertimi}}</td>
                                <td id="specifika" >{{App\Product::getProductKlasifikimi($product->ID, 1)}}, {{App\Product::getProductKlasifikimi($product->ID, 2)}}</td>
                                <td>
                                    @if(App\Aksionet::getAksion($product->ID)== 1 && App\Aksionet::getAksionQmimorja($product->ID) == Auth::user()->qmimorja)       
                                        <del>{{App\Product::getProductPrice($product->ID, Auth::user()->qmimorja)}} €</del> <strong><p class="d-inline text-danger">{{App\Product::getPriceWithDiscount($product->ID,Auth::user()->qmimorja, App\Aksionet::getPercentage($product->ID))}} € </p> </strong>
                                    @else
                                        {{App\Product::getProductPrice($product->ID, Auth::user()->qmimorja)}} € - {{App\Product::getProductPrice($product->ID, 'R')}} € 
                                    @endif
                                </td>
                                <td id="sasia-field">
                                    <form class="form-inline  p-0" method="POST" id="{{$product->ID}}" action="{{route('cart.store')}}">
                                        @csrf
                                          <button class="d-none d-sm-block btn btn-light" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onclick="if(parseInt(sasia.value) > 0) sasia.value = parseInt(sasia.value)-1;" type="button"><i class="fa fa-minus"></i></button>
                                        <input class="form-control" type="text" name="sasia" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onchange="if(parseInt(sasia.value) > {{App\Product::getProductStock($product->ID)}})alert('Sasia eshte me e madhe se stoku');" id="sasia" placeholder="Sasia" value="{{App\Cart::getProductQuantityOnCart($product->ID, auth()->user()->id)}}">
                                        <button class="d-none d-sm-block btn btn-light" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onclick="if(parseInt(sasia.value) < {{App\Product::getProductStock($product->ID) }})  sasia.value = parseInt(sasia.value)+1 ;" type="button"><i class="fa fa-plus"></i></button>
                                        <input type="text"  name="pID" id="pID" hidden value="{{$product->ID}}">
                                  
                                    </form>
                                </td>
                                <td>
                                    <button type="submit" form ="{{$product->ID}}"  
                                        @if(App\Product::getProductStock($product->ID) == 0)
                                            class="btn btn-danger btn-red" disabled>
   
                                        @elseif(App\Product::getProductStock($product->ID) < 3 && App\Product::getProductStock($product->ID) > 0)
                                            class="btn btn-warning btn-yellow">
                                        @else 
                                            class="btn btn-success">
                                        @endif
                                    <i class="fa fa-lg fa-cart-plus"></i></button>
                                </td>                               
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">Nuk u gjetën produkte</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div id="card-view" class="container-fluid">
                @if(count($products) > 0)
                    @foreach($products as $product)
                    <div class="card mb-2">
                        
                        <div id="card-row" class="row"> 
                            <div class="col-md-4 d-flex border-right">    
                                <img id="image" class="float-right mx-auto " src="{{App\Product::getPhoto($product->ID)}}">
                                @if(App\Aksionet::getAksion($product->ID)== 1)       
                                <img id="card-label" class="d-inline float-right" src="{{asset('images/aksion.png')}}">
                            @elseif(App\Aksionet::getAksionNew($product->ID)== true)
                                <img id="card-label"  class="d-inline  float-right"  src="{{asset('images/new.png')}}">         
                            @elseif(App\Aksionet::getAksion($product->ID)== 3)
                                <img id="card-label"  class="d-inline  float-right"  src="{{asset('images/top.png')}}">        
                            @else
                            @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{App\Product::getProducer($product->ID)}} {{$product->Emertimi}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$product->Barcode}}  </h6>
                                    <p class="card-text">{{App\Product::getProductKlasifikimi($product->ID, 1)}}, {{App\Product::getProductKlasifikimi($product->ID, 2)}}</p> 
                                    <p class="card-text d-inline font-weight-bold"> 
                                        @if(App\Aksionet::getAksion($product->ID)== 1)       
                                            <del>{{App\Product::getProductPrice($product->ID, Auth::user()->qmimorja)}} €</del> <strong> <p class="d-inline text-danger">{{App\Product::getPriceWithDiscount($product->ID,Auth::user()->qmimorja, App\Aksionet::getPercentage($product->ID))}} € </p> </strong>
                                        @else
                                        {{App\Product::getProductPrice($product->ID, Auth::user()->qmimorja)}} € - {{App\Product::getProductPrice($product->ID, 'R')}} €
                                        @endif
										
									
                                   </p> 
                                    <div class="row float-right my-4 d-flex justify-content-end pr-2">
                                        <form class="d-inline mr-2" method="POST" id="card{{$product->ID}}" action="{{route('cart.store')}}">
                                            @csrf
                                            <button class="d-inline btn btn-light" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onclick="if(parseInt(sasia.value) > 0) sasia.value = parseInt(sasia.value)-1;" type="button"><i class="fa fa-minus"></i></button>
                                        <input class="d-inline form-control" type="text" name="sasia" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onchange="if(parseInt(sasia.value) > {{App\Product::getProductStock($product->ID)}})alert('Sasia eshte me e madhe se stoku');" id="sasia" placeholder="Sasia" value="{{App\Cart::getProductQuantityOnCart($product->ID, auth()->user()->id)}}">
                                        <button class="d-inline btn btn-light" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onclick="if(parseInt(sasia.value) < {{App\Product::getProductStock($product->ID)}}) sasia.value = parseInt(sasia.value)+1;" type="button"><i class="fa fa-plus"></i></button>
										<input type="text"  name="pID" id="pID" hidden value="{{$product->ID}}">
                                                    </form>
													<button type="submit" form ="card{{$product->ID}}"  
                                            @if(App\Product::getProductStock($product->ID) == 0)
                                            class="btn btn-danger btn-red" disabled>
   
                                        @elseif(App\Product::getProductStock($product->ID) < 3 && App\Product::getProductStock($product->ID) > 0)
                                            class="btn btn-warning btn-yellow">
                                        @else 
                                            class="btn btn-success">
                                        @endif
                                        <i class="fa fa-lg fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                            <h3>Nuk u gjetën produkte</h3>
                            
                    @endif
                </div>
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@else

@endif