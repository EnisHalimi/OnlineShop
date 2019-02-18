@extends('layouts.app')
@section('aksion','active')

@if(@auth)
@section('content')
<div class="container">
<div class="d-flex float-left">
        <h3 class="float-left"> Menaxho Aksionet</h3>
        
    </div>
    <div class="d-flex justify-content-end">
       @if(auth()->user()->admin == 1)
       <a href="/aksion/create" class="btn btn-primary"><i class="fa fa-plus"></i> Shto Produkte </a>
       @else
       @endif
    </div> 
    <hr>
<table id="table" class="table table-hover  table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tipi</th>
            <th scope="col">Emertimi</th>
            <th scope="col">Qmimi</th>
            <th scope="col">Qmimi me zbritje</th>
            <th scope="col">Rabati</th>
            <th scope="col">Qmimorja</th>
            <th scope="col">Menaxhimi</th>
        </tr>
    </thead>
    <tbody>
           @if(count($aksion)>0)
            @foreach($aksion as $aks)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    @if($aks->tipi==1)
                    Aksion
                    @elseif($aks->tipi==2)
                    I ri
                    @else
                    I rekomanduar

                @endif
                </td> 
                
                <td>{{App\Product::getName($aks->productID)}}</td>                 
                <td>{{App\Product::getProductPrice($aks->productID, auth()->user()->qmimorja)}}</td>  
                <td>
                @if($aks->tipi == 1)
                    {{App\Product::getPriceWithDiscount($aks->productID, auth()->user()->qmimorja,$aks->rabati)}}
                
                @else
                -
                @endif
                </td>   
                <td>
                    @if($aks->tipi == 1)
                        {{($aks->rabati*100) }} %
                    
                    @else
                    -
                    @endif
                    </td>     
                    <td>{{$aks->qmimorja}}</td>
                <td>
                        
                    
                        <a href="/aksion/{{$aks->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Ndrysho </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fshijModal{{$aks->id}}">
                                <i class="fa fa-trash"></i> Fshij
                              </button>
                              

                              <div class="modal fade" id="fshijModal{{$aks->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$aks->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="fshijModalLabel{{$aks->id}}">Fshij Aksionin</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      A jeni i sigurtë që doni të vazhdoni?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                      <form class="d-inline" method="POST" action="{{ route('aksion.destroy',$aks->id)}}" accept-charset="UTF-8">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Fshij</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                    
                </td>                 
                </tr>
            @endforeach
           @else
            <tr>
                    <td colspan="8">Nuk u gjetën aksione</td>
                    
            </tr>
           @endif
        
    </tbody>
</table>
{{ $aksion->appends(request()->query())->links() }}
</div>
       
@endsection
@else

@endif