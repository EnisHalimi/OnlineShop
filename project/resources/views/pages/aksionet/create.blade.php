@extends('layouts.app')
@section('aksion','active')
@section('menaxhimi','active')

@if(@auth)
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">Krijo Aksion </h3>
                    <form method="POST" action="{{ route('aksion.store') }}">
                        @csrf

                        <div class="form-group row">
                                <label for="tipi" class="col-md-4 col-form-label text-md-right">{{ __('Tipi') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="tipi" name="tipi">
                                            <option value="1">Zbritje</option>
                                            <option value="3">Produkt i rekomanduar</option>
                                        </select>
                                    </div>
                            </div>

                       <div class="form-group row">
                            <label for="rabati" class="col-md-4 col-form-label text-md-right">{{ __('Produkti') }}</label>
                                <div class="col-md-6">

                                    <input class="form-control" autocomplete="off" required type="text" id="aksionPID" name="aksionPID" value="" placeholder="Kërko Produktin">

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
                        <label for="a" class="col-md-4 col-form-label text-md-right">{{ __('Rabati') }}</label>
                                <div class="col-md-6">
                                   <input class="form-control" type="range" oninput="rabati.value = a.value / 100; text.innerHTML = a.value+' %'" id="a" name="a" value="0"> <label class="col-form-label" for="a" id="text" name="r-text"> </label>

                                   <input  class="form-control" readonly  hidden name="rabati" value="0" id="rabati">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regjistroModal">
                                                <i class="fa fa-plus"></i> Regjistro
                                            </button>
                                            <div class="modal fade" id="regjistroModal" tabindex="-1" role="dialog" aria-labelledby="regjistroModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="regjistroModalLabel">Regjistro Aksionin</h5>
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
