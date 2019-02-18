@extends('layouts.app')
@section('picture','active')

@if(@auth)
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">Shto Foto </h3>
                    <form method="POST" action="{{ url('addPicture') }}" enctype="multipart/form-data">
                        @csrf


                       <div class="form-group row">
                            <label for="rabati" class="col-md-4 col-form-label text-md-right">{{ __('Produkti') }}</label>
                                <div class="col-md-6">
                                        
                                    <input class="form-control" autocomplete="off" required type="text" id="aksionPID" name="aksionPID" value="" placeholder="Kërko Produktin">
                        
                                </div>
                        </div>
							<div class="form-group row">
							  
							 
								<label class="col-md-4 col-form-label text-md-right" for="cover_image">Foto</label>
								 <div class="col-md-6">
                                        
										 <div class="custom-file">
										 <label class="custom-file-label" id="file-label" for="inputGroupFile01">Zgjidh foton</label>
										  <input type="file" class="custom-file-input" onchange="res =  cover_image.value.split('\\');
  document.getElementById('file-label').innerHTML = ''+res[2];" id="cover_image" name="cover_image" aria-describedby="inputGroupFileAddon01">
											
  </div>
                              
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