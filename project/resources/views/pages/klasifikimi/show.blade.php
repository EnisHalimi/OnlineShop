@extends('layouts.app')
@section('klasifikimi','active')
@section('menaxhimi','active')
@if(@auth)
@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <h3>Të dhënat e përdoruesit</h3>
            <hr>
        </thead>
        <tbody>
            <tr>
                <th>Nr</th>
                <td scope="row">{{$klasifikimi->id}}</td>
            </tr>
            <tr>
                <th>Emertimi</th>
                <td scope="row">{{$klasifikimi->Emertimi}}</td>
            </tr>
            <tr>
                <th>Ngjyra</th>
                <td scope="row">{{$klasifikimi->ikona_name}}</td>
            </tr>
            <tr>
                <th>Ikona</th>
                <td scope="row"><img class="img-thumbnail" src="{{$klasifikimi->ikona}}"></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/klasifikimi" ><i class="fa fa-chevron-left"></i> Kthehu</a>
</div>
@endsection
@else
@endif
