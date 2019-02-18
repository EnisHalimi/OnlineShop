@extends('layouts.app')
@section('menaxhimi','active')

@if(@auth)
@section('content')

<div class="container">
    <div class="d-flex float-left">
        <h3 class="float-left"> Të dhënat tuaja</h3>
        
    </div>
    <div class="d-flex justify-content-end">
       @if(auth()->user()->admin == 1)
       <a href="/aksion" class="btn btn-primary"><i class="fa fa-tags"></i> Aksionet </a>
       @else
       @endif
    </div> 
    <hr>
        <table class="table table-striped ">
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
                    <th>Nr.Porosive:</th>
                    <td scope="row">{{$nrporosive}}</td>
                </tr>
                <tr>
                        <th>Vlera:</th>
                        <td scope="row">{{$sasia}} €</td>
                </tr>
                </tbody>
        </table>

        <a href="/user/{{$user->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Ndrysho </a>
        
       
@endsection
@else

@endif