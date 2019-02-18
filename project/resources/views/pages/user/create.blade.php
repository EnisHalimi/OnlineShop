@extends('layouts.app')
@section('users','active')

@if(@auth)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">Krijo Përdorues </h3>
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Emri</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus placeholder="Emri">
                                    <span class="name-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="" required autofocus placeholder="E-Mail">
                                        <span class="email-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" value="" required autofocus placeholder="Password">
                                            <span class="password-feedback"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmo Password</label>
            
                                        <div class="col-md-6">
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus placeholder="Password">
                                                <span class="password2-feedback"></span>
                                        </div>
                                    </div>

                        <div class="form-group row">
                        <label for="qmimorja" class="col-md-4 col-form-label text-md-right">{{ __('Qmimorja') }}</label>
                                <div class="col-md-6">
                                    
                                    <select class="form-control" id="qmimorja" name="qmimorja">
                                            <option>R</option>
                                            <option>R1</option>
                                        </select>
                            </div>
                        </div>
                          <div class="form-group row">
                        <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Roli') }}</label>
                                <div class="col-md-6">
                                
                                    <select class="form-control" id="admin" name="admin">
                                            <option value="0">Përdorues</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Agjent</option>
                                        </select>
                            </div>
                        </div>
                       
                        <input id="status" type="text" class="form-control" name="status" value="1" hidden>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regjistroModal">
                                                <i class="fa fa-plus"></i> Regjistro
                                            </button>
                                            <div class="modal fade" id="regjistroModal" tabindex="-1" role="dialog" aria-labelledby="regjistroModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="regjistroModalLabel">Regjistro Përdoruesin</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            A jeni i sigurtë që doni të vazhdoni?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Regjistro</button>                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@else

@endif