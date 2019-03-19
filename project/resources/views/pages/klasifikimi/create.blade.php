@extends('layouts.app')
@section('klasifikimi', 'active')
@section('menaxhimi-drop', 'active')

@if(@auth)
@section('content')
<div class="container">
    <h3 class="text-center">Shto Klasifikim</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form" method="POST" id="registerForm" action="{{ route('klasifikimi.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="emertimi">Emertimi</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="emertimi" name="emertimi" placeholder="Emertimi" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="ngjyra">Ngjyra</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="ngjyra" name="ngjyra" placeholder="Ngjyra" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="cover_image">Ikona</label>
                    <div class="col-md-6">
                        <div class="custom-file">
                            <label class="custom-file-label" id="file-label" for="inputGroupFile01">Zgjidh ikonen</label>
                            <input type="file" class="custom-file-input" onchange="res =  cover_image.value.split('\\');document.getElementById('file-label').innerHTML = ''+res[2];" id="cover_image" name="cover_image" aria-describedby="inputGroupFileAddon01" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regjistroModal"><i class="fa fa-plus"></i> Regjistro</button>
                        <div class="modal fade" id="regjistroModal" tabindex="-1" role="dialog" aria-labelledby="regjistroModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="regjistroModalLabel">Regjistro Klasifikimin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        A jeni i sigurtë që doni të vazhdoni?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                        <button type="submit" form="registerForm" class="btn btn-success"><i class="fa fa-plus"></i> Regjistro</button>
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
@endsection
@else
@endif
