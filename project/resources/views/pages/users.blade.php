@extends('layouts.app')
@section('users','active')

@if(@auth)
@section('content')
    <div class="row mx-auto">
    
    <div class="container">
        <div class="d-flex float-left">
            <h3 class="float-left">Menaxho Përdoruesit</h3>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/user/create" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Shto Përdorues</a>
        </div> <table id="table" class="table table-hover   border-secondary   table-bordered">
                    <thead class="bg-dark text-light">
                        
                        <hr class="border border-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Emri</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Qmimorja</th>
                            <th scope="col">Porositë</th>
                            <th scope="col">Menaxhimi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr>
                            
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}} @if($user->admin == 1) (Administrator) @elseif($user->admin == 2) (Agjent) @else @endif</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->qmimorja}}</td>
                            <td>{{App\Order::getNrPorosive($user->id)}}</td>
                            <td>
                                    <button onclick="location.href='/user/{{$user->id}}';" class="btn btn-dark"><i class="fa fa-eye"></i> Shiko </button>
                                    <button  onclick="location.href='/user/{{$user->id}}/edit';" @if($user->id == auth()->user()->id) disabled @else @endif class="btn btn-primary"><i class="fa fa-pencil"></i> Ndrysho </button>
                                    <button @if($user->id == auth()->user()->id) disabled @else @endif type="button" class="btn btn-danger" data-toggle="modal" data-target="#fshijModal{{$user->id}}">
                                        <i class="fa fa-trash"></i> Fshij
                                    </button>
                                    <div class="modal fade" id="fshijModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$user->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fshijModalLabel{{$user->id}}">Fshij Përdoruesin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    A jeni i sigurtë që doni të vazhdoni?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                    <form class="d-inline" method="POST" action="{{ route('user.destroy',$user->id)}}" accept-charset="UTF-8">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Fshij</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <button type="button" @if($user->id == auth()->user()->id) disabled @else @endif class="btn btn-secondary" data-toggle="modal" data-target="#statusModal{{$user->id}}">
                                        
                                        @if($user->status == true)
                                        <i class="fa fa-user"></i> Aktiv  
                                        @else
                                        <i class="fa fa-user-times"></i>   Pasiv
                                        @endif
                                    </button>
                                    <div class="modal fade" id="statusModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{$user->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="statusModalLabel{{$user->id}}">Ndërro statusin e Përdoruesit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    A jeni i sigurtë që doni të vazhdoni?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                    <form class="d-inline" method="POST" action="{{ url('changeStatus')}}" accept-charset="UTF-8">
                                                        @csrf
                                                    <input name="id" type="hidden" value="{{$user->id}}">
                                                        <button type="submit" class="btn @if($user->status == true)
                                                             btn-danger" ><i class="fa fa-user-times"></i> 
                                                            @else
                                                            btn-success" ><i class="fa fa-user"></i> 
                                                            @endif  Ndrysho</button>
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
                                <td colspan="6">Nuk u gjetën përdorues</td>
                                
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $users->appends(request()->query())->links() }}
    </div>
    </div>
@endsection
@else

@endif