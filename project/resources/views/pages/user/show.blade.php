@extends('layouts.app')
@section('users','active')

@if(@auth)
@section('content')
<div class="container">
<table class="table table-striped ">
            <thead>
                <h3>
                    Të dhënat e përdoruesit
                </h3>
            <hr>
            </thead>
            <tbody>
                <tr>
                    <th>Emri:</th>
                    <td scope="row">{{$user->name}}</td>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <td scope="row">{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Data e regjistrimit:</th>
                    <td scope="row">{{$user->created_at}} </td>
                </tr>
                <tr>
                    <th>Qmimorja:</th>
                    <td scope="row">{{$user->qmimorja}}</td>
                </tr>
                <tr>
                        <th>Nr.Porosive:</th>
                        <td scope="row">{{$nrporosive}}</td>
                    </tr>
                    <tr>
                            <th>Vlera:</th>
                            <td scope="row">{{$sasia}} €</td>
                    </tr>
                <tr>
                    <th>Roli:</th>
                    @if($user->admin == 1)
                    <td scope="row">Administrator</td>
                    @elseif($user->admin == 2)
                    <td scope="row">Agjent</td>
                    @else
                    <td scope="row">Përdorues</td>
                    @endif
                </tr>
                <tr>
                    <th>Aktiv:</th>
                    @if($user->status == 1)
                    <td scope="row">Po</td>
                    @else
                    <td scope="row">Jo</td>
                    @endif
                </tr>
                </tbody>
        </table>
        <a class="btn btn-primary" href="/user" ><i class="fa fa-chevron-left"></i> Kthehu</a>
</div>
        @endsection
        @else
        
        @endif