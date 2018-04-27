@extends('layout-universal.master')

@section('css')
<link href='{{ asset("/imageUpload/dist/css/bootstrap-imageupload.css") }}' rel="stylesheet">
<link rel="stylesheet" href="{{ asset("/adminlte/plugins/datepicker/datepicker3.css") }}">
@endsection
@section('content')
@section('active',"active")

<div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-12 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="{{url('konfirmasi/simpan')}}">
                                {{ csrf_field() }}

<!-- value="{{$pembeli->alamat}}" -->
              


                                <div class="content">
                                    <div class="row">
                                  
                                       <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('kode')) has-error @endif">
                                                <label for="street">Your Transaction Code</label>
                                                <input type="text" class="form-control" name="kode" value="{{ old('kode') }}" id="kode">
                                                @if ($errors->has('kode')) <p class="help-block">{{ $errors->first('kode') }}</p> @endif            
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('tanggal')) has-error @endif">
                                                <label for="phone">Transfer Date</label>
                                                <input type="text" data-date-end-date="0d" class="form-control" id="datepicker"  value="{{ old('tanggal') }}" name="tanggal" id="tanggal">
                                                @if ($errors->has('tanggal')) <p class="help-block">{{ $errors->first('tanggal') }}</p> @endif            
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- /.row -->

                                    <div class="row">
                                        
                                        
                                         <div class="col-sm-6 col-md-4">
                                            <div class="form-group @if ($errors->has('bank')) has-error @endif">
                                                <label >Your Bank</label>
                                                <input class="form-control" name="bank" id="bank" value="{{ old('bank') }}"></input>
                                                @if ($errors->has('bank')) <p class="help-block">{{ $errors->first('bank') }}</p> @endif            
                                            </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                            <div class="form-group @if ($errors->has('no_rek')) has-error @endif">
                                                <label >Bank Account Number</label>
                                                 <input class="form-control" name="no_rek" id="no_rek" value="{{ old('no_rek') }}"></input>
                                                 @if ($errors->has('no_rek')) <p class="help-block">{{ $errors->first('no_rek') }}</p> @endif            
                                            
                                            </div>
                                        </div>
                                              <div class="col-sm-6 col-md-4">
                                            <div class="form-group @if ($errors->has('atas_nama')) has-error @endif">
                                                <label>Bank Account Name</label>
                                                <input type="text" name="atas_nama" class="form-control" id="atas_nama" value="{{ old('atas_nama') }}">
                                                @if ($errors->has('atas_nama')) <p class="help-block">{{ $errors->first('atas_nama') }}</p> @endif            
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                  
                                       <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('nominal')) has-error @endif">
                                                <label for="street">Nominal Transfer</label>
                                                <input type="text" class="form-control" name="nominal" value="{{ old('nominal') }}" id="nominal">
                                                @if ($errors->has('nominal')) <p class="help-block">{{ $errors->first('nominal') }}</p> @endif            
                                            </div>
                                        </div>

 <div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="photo" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="photo">Example Photo Transfer</h4>
                    </div>
                    <div class="modal-body">
                       <img src="{{url('universal/img/bukti.jpg')}}" class="img-responsive" alt="#">
                    </div>
                </div>
            </div>
        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('bukti')) has-error @endif">
                                                <label for="gambar">Photo of your transfer</label><a style="    border: solid; margin-left: 6px;" href="#" data-toggle="modal" data-target="#photo-modal"><i class="fa fa-question"></i></a>


                                                <div class="imageupload">
                                                <div class="file-tab">
                                                  <label style="padding:6px 12px; width: 100%; font-size:12px" class="btn btn-default btn-file">
                                                    <span>Upload</span>

                                                    <!-- The file is stored here. -->
                                                    <input type="file" name="image">  

                                                  </label>
                                                  <button type="button" class="btn btn-default" style="padding:6px 12px; font-size:12px">Hapus</button>
                                                   @if ($errors->has('bukti')) <p class="help-block">{{ $errors->first('bukti') }}</p> @endif
                                                </div>
                                              </div>
                                             
                                                 <input type="hidden" name="bukti" value="{{ old('bukti') }}" id="bukti">
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('detail')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Order Review</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" id="submit" class="btn btn-template-main">Submit Your Confirmation<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

        
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->

      


        <!-- *** GET IT END *** -->
        @endsection

            @section('js')
              <script src="{{ asset('vendor/select2/select2.js') }}"></script>
<script src='{{ asset("/imageUpload/dist/js/bootstrap-imageupload.min.js") }}'></script>
  <script>
    var $imageupload = $('.imageupload');
    $imageupload.imageupload({
      maxFileSizeKb:7000
    });

    $('#submit').click(function(){
        $imgsrc=$('.thumbnail').attr('src');
        $('#bukti').val($imgsrc);
      });

  </script>
   <script src="{{ asset("/adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
  <script charset="UTF-8" src="{{ asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.id.js') }}"></script>
  <script>
     //Date picker
    $('#datepicker').datepicker({
      language: "eng",
      autoclose: true,
      format: 'd MM yyyy',
      todayHighlight: true,
      todayBtn: "linked",

    });   
  </script>

 @endsection    
 
  