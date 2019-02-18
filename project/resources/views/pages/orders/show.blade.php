@extends('layouts.app')
@section('porosite','active')

@if(@auth)
@section('content')

<div class="container">
    <table id="table" class="table table-hover table-bordered ">
        <h3>Të dhënat e porosisë</h3>
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">Subjekti</th>
                <th scope="col">Data</th>
                <th scope="col">Vlera</th>
                <th scope="col">Sasia</th>
				<th scope="col">Data e dërgesës</th>
				<th scope="col">Mesazhi</th>
				
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>  @if($order->subjekti !== null) {{$order->subjekti}} ({{$user->name}}) @else {{$user->name}}@endif </td>
                    <td>{{$order->created_at}}</td>
                    <td>{{number_format($order->value,2)}} €</td>
                    <td>{{$order->quantity}}</td>
					<td>{{$order->dergesa}}</td>
					<td>{{$order->mesazhi}}</td>
                </tr>

        </tbody>
    </table>
    <hr class="border my-3">
    <table id="table" class="table table-hover  table-bordered">
        <h3>Produktet</h3>
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">Barkodi</th>
                <th scope="col">Titulli</th>
                <th scope="col">Specifika</th>
                <th scope="col">Qmimi</th>
                <th scope="col">Sasia</th>
            </tr>
        </thead>
        <tbody>
                @if(count($products) > 0)
                @foreach($products as $product)
                    <tr>
                    
                            <td>{{$product->Barcode}}</td>
                            <td>{{$product->Emertimi}}</td>
                            <td>{{App\Product::getProductKlasifikimi($product->ID, 1)}}, {{App\Product::getProductKlasifikimi($product->ID, 2)}}</td>
                            <td>{{App\Product::getProductPrice($product->ID, $user->qmimorja)}} €</td>
                            <td>{{App\Products_Order::getQuantityOfProduct($product->ID, $order->id)}}</td>
                        
                    
                </tr>
                @endforeach
                @else
                <tr>
                        <td>Nuk u gjetën produkte</td>
                        
                </tr>
                @endif
        </tbody>
        
    </table>
<a class="btn btn-primary" href="/order" ><i class="fa fa-chevron-left"></i> Kthehu</a>
    </div>

@endsection
@else

@endif