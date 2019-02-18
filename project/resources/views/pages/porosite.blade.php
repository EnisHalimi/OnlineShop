@extends('layouts.app')
@section('porosite','active')
@if(@auth)
@section('content')
<div class="container">
<h3 >Menaxho Porositë</h3>
     <table id="table" class="table table-hover  table-bordered">
                        <thead class="bg-dark text-light">
                                <hr class="border border-secondary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subjekti</th>
                                <th scope="col">Data</th>
                                <th scope="col">Vlera</th>
                                <th scope="col">Sasia</th>
								<th scope="col">Data e dërgesës</th>
                                <th scope="col">Menaxho</th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count($orders) > 0)
                                @foreach($orders as $order)
                                    <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{App\Order::getUserName($order->id)}} @if(strlen($order->subjekti) >  2) ({{$order->subjekti }}) @else @endif</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->value}} €</td>
                                    <td>{{App\Products_Order::getQuantityTotal($order->id)}}</td>
									<td>{{$order->dergesa}}</td>
                
                                    <td>
                                    <a href="/order/{{$order->id}}" class="btn btn-dark"><i class="fa fa-eye"></i> Shiko </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ndryshoModal{{$order->id}}">
                                            <i class="fa fa-pencil"></i> Ndrysho
                                          </button>
                                          
            
                                          <div class="modal fade" id="ndryshoModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="ndryshoModalLabel{{$order->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="ndryshoModalLabel{{$order->id}}">Ky veprim do e shlyej shportën e tanishme</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  A jeni i sigurtë që doni të vazhdoni?
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                  <a href="/order/{{$order->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Ndrysho </a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          @if(auth()->user()->admin == 1)
                                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#fshijModal{{$order->id}}">
                                                <i class="fa fa-trash"></i> Fshij
                                              </button>
                                              
                
                                              <div class="modal fade" id="fshijModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$order->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="fshijModalLabel{{$order->id}}">Fshij Porosinë</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      A jeni i sigurtë që doni të vazhdoni?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                      <form class="d-inline" method="POST" action="{{ route('order.destroy',$order->id)}}" accept-charset="UTF-8">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Fshij</button>
                                                        </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              @else

                                              @endif
                                    
                                        
                                    </td>
                                    
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                        <td colspan="6">Nuk u gjetën porosi</td>
                                        
                                </tr>
                                @endif

                        </tbody>
                    </table>
                    {{ $orders->appends(request()->query())->links() }}

                  </div>
@endsection
@else

@endif