@extends('layouts.app')
@section('klasifikimi','active')
@section('menaxhimi', 'active')

@if(@auth)
@section('content')
<div class="container">
    <h3 class="text-left d-inline">Klasifikimet e Klientit</h3>
    <a class="btn btn-success d-inline float-right" href="/klasifikimi/create"><i class="fa fa-plus"></i>Shto Klasifikim</a>
    <hr>
    <div class="row">
        <table class="table table-stripped table-bordered">
            <thead>
                <th>Nr</th>
                <th>Emertimi</th>
                <th>Ngjyra</th>
                <th>Ikona</th>
                <th>Menagjimi</th>
            </thead>
            <tbody>
                @foreach($klasfikimet as $klasifikimi)
                <tr>
                    <td>{{$klasifikimi->id}}</td>
                    <td>{{$klasifikimi->Emertimi}}</td>
                    <td>{{$klasifikimi->ikona_name}}</td>
                    <td><img class="img-thumbnail" style="width: 35px; height: 50px" src="{{$klasifikimi->ikona}}" /></td>
                    <td>
                        <a href="/klasifikimi/{{$klasifikimi->id}}"class="btn btn-dark"><i class="fa fa-eye" ></i>Shiko</a>
                        <a href="/klasifikimi/{{$klasifikimi->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i>Ndrysho</a>
                        <form class="d-inline"  accept-charset="UTF-8" method="POST" action="{{route('klasifikimi.destroy',$klasifikimi->id)}}" >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Fshij</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@else
@endif
