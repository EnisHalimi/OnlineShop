@extends('layouts.app')
@section('shporta','active ')

@if(@auth)
@section('content')
<div class="container">
<table id="table" class="table table-hover  table-bordered">
        <h3>Shporta</h3>
        <hr class="border border-secondary">
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">#</th>
				<th scope="col">Barkodi</th>
                <th scope="col">Titulli</th>
                <th scope="col">Qmimi</th>
                <th scope="col">Sasia</th>
                <th scope="col">Totali</th>
                <th scope="col">Menaxhimi</th>
            </tr>
        </thead>
        <tbody>
                @if(count($cart) > 0)
                @foreach($cart as $ct)            
                <tr>
                    <td>{{$loop->iteration}}</td>
					<td>{{App\Product::getBarcode($ct->ProductID)}}</td>
                    <td>{{$ct->Emri}}</td>
                    <td>{{number_format($ct->Qmimi,2)}} €</td>
                    <td id="sasia-field">

                        <form class="d-inline"  id="{{$ct->id}}" method="POST" action="{{ route('cart.update',$ct->id) }}">
                            @csrf   
                            <input name="_method" type="hidden" value="PUT"> 
                        <input class="form-control" type="text" name="sasia{{$ct->id}}" id="sasia" placeholder="Sasia" value="{{$ct->Sasia}}">
                        </form>
                        
                    </td>
                    <td>{{number_format($ct->Qmimi*$ct->Sasia,2)}} €</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ndryshoModal{{$ct->id}}">
                            <i class="fa fa-pencil"></i> Ndrysho
                        </button>
                        <div class="modal fade" id="ndryshoModal{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="ndryshoModalLabel{{$ct->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ndryshoModalLabel{{$ct->id}}">Ndrysho Sasine</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        A jeni i sigurtë që doni të vazhdoni?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                        <button type="submit" form="{{$ct->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Ndrysho</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fshijModal{{$ct->id}}">
                                <i class="fa fa-trash"></i> Fshij
                            </button>
                            <div class="modal fade" id="fshijModal{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$ct->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fshijModalLabel{{$ct->id}}">Fshij nga shporta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            A jeni i sigurtë që doni të vazhdoni?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                            <form class="d-inline" id="{{$ct->id}}d" method="POST" action="{{ route('cart.destroy',$ct->id)}}" accept-charset="UTF-8">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                </form>
                                                    <button type="submit" form="{{$ct->id}}d" class="btn btn-danger" ><i class="fa fa-trash"> </i> Fshij</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                       
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                        <td colspan="7">Shporta është e zbrazët</td>
                        
                </tr>
                @endif
        </tbody>
        
    </table>
	<div class="row">
		<form class="form-inline" id="porosia" method="POST" action="{{ route('order.store') }}">
			@csrf
			<div class="form-group ">
				<label class="text-md-right" for="mesazhi">Mesazhi</label>
                <div class="col-md-2">
					<textarea class="form-control" name="mesazhi" id="mesazhi" placeholder="Mesazhi"></textarea>
				</div>
			</div>
			<div class="form-group d-block">
			<div class="mb-2 ml-2 row">
				<label for="rabati" class="text-md-right mr-2">Data e Dergeses</label>
				<input type="date" class="form-control" required="" name="dergesa" id="dergesa" min="{{date('Y-m-d',strtotime('tomorrow'))}}" placeholder="Data e Dergeses">
			</div>
			@if(Auth::user()->admin !== 0)
			<div class="ml-2 row  ">
				<label for="rabati" class="text-md-right mr-4">Subjekti</label>
				<input autocomplete="off" required="" type="text" id="porosiSubjekti" name="subjekti" value="" placeholder="Kërko Subjektin" class="form-control ui-autocomplete-input">
			</div>
			@else
			@endif 
		</div>
    </form>
	</div>
	<div class="mt-2 row">
				<button type ="submit" form="porosia" class="btn btn-primary">Dërgo Porosinë</button>
			</div>
	
</div>
@endsection
@else

@endif