@extends('layouts.app')
@section('midland','active')

@if(@auth)
@section('content')
<div class="row justify-content-center">
    <div class="col-md-2 ml-1 ">
        <div class="row" id="search-container">
            <div class="row w-100 d-flex justify-content-center">
            <form action="{{ url('productMidland') }}" autocomplete="off">
                <div class="form-group auto">
                    <input class="form-control" type="text" autocomplete="off" required value="{{$keyword}}" name="search" id="search" placeholder="Kerko"/>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Kërko</button>
                </div>
            </form>
        </div>
            <div class="row w-100 ">
                <div class="panel-group w-100 border-bottom  mb-2">
                    <div class="row d-block">
                        <p class="text-center">Nuk jeni i sigurt për vajin? Vizito katalogun e Midland</p>
                    </div>
                    <div class="row d-block d-flex justify-content-center">
                        <h5><a class="btn btn-primary" href="http://oelbrack.lubricantadvisor.com/default.aspx?Lang=eng">Katalogu</a></h5>
                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="panel-group w-100 ">
                        <ul class="list-unstyled ">
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="PKV" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">PKV</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="LKV" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">LKV</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="Transmission" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Transmission</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="Hydraulic" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Hydraulic</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="Motorcycle" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Motorcycle</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="Industry" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Industry</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ url('customSearch') }}">
                                                                <input type="text" name="search" value="Aditiv" hidden/>
                                                                <input type="text" name="tipi" value="22" hidden/>
                                                                <button class="btn btn-light text-left list-group-item w-100" type="submit">Aditiv</button>
                                                            </form>
                                                        </li>
                                                    </ul>
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
                            <div class="col-md-3">
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
                        <div class="row mt-3">
                                
                            <table id="products" class="table table-hover table-bordered ">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th scope="col">Barkodi</th>
                                        <th scope="col">Emërtimi</th>
                                        <th id="specifika" scope="col">Specifika</th>
                                        <th scope="col">Qmimi</th>
                                        <th scope="col">Sasia</th>
                                        <th scope="col">Shporta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @if(count($products) > 0)
                                        @foreach($products as $product)                 
                                <tr>
                                    <td >
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
                                                <td>{{$product->Emertimi}}</td>
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
                                        <button class="d-none d-sm-block btn btn-light" @if(App\Product::getProductStock($product->ID) == 0) disabled @else @endif onclick="if(parseInt(sasia.value) < {{App\Product::getProductStock($product->ID)}}) sasia.value = parseInt(sasia.value)+1;" type="button"><i class="fa fa-plus"></i></button><input type="text"  name="pID" id="pID" hidden value="{{$product->ID}}">
                                              
                                                </form>
                                                </td>
                                            <td>
                                                    <button type="submit" form ="{{$product->ID}}"  
                                                        @if(App\Product::getProductStock($product->ID) == 0)
                                            class="btn btn-danger btn-red" disabled>
   
                                        @elseif(App\Product::getProductStock($product->ID) < 5 && App\Product::getProductStock($product->ID) > 0)
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
                            </div>
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
                                                <h5 class="card-title">{{$product->Emertimi}}</h5>
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
   
                                        @elseif(App\Product::getProductStock($product->ID) < 5 && App\Product::getProductStock($product->ID) > 0)
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