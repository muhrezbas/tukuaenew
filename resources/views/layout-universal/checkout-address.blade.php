@extends('layout-universal.master')

@section('css')

@endsection
@section('content')
@section('active',"active")

<div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="{{url('alamat/simpan')}}">
                                {{ csrf_field() }}

                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                  
                                       <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('alamat')) has-error @endif">
                                                <label for="street">Street</label>
                                                <input type="text" class="form-control" name="alamat" value="{{$pembeli->alamat}}" id="street">
                                                 @if ($errors->has('alamat')) <p class="help-block">{{ $errors->first('alamat') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group @if ($errors->has('telp')) has-error @endif" >
                                                <label for="phone">Telephone</label>
                                                <input type="text" class="form-control"  value="{{$pembeli->telp}}" name="telp"id="phone">
                                                 @if ($errors->has('telp')) <p class="help-block">{{ $errors->first('telp') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <!-- /.row -->

                                    <div class="row">
                                      <!--   value="{{ old('kode') }} -->

                                        
                                         <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select class="form-control" name="provinsi" id="provinsi" value="{{$pembeli->provinsi}}"></select>
                                            </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                 <select class="form-control" name="kota" id="kota" value="{{$pembeli->kota}}"></select>
                                                 <input type="hidden" name="id_kota" id="id_kota">
                                            </div>
                                        </div>
                                              <div class="col-sm-6 col-md-4">
                                            <div class="form-group @if ($errors->has('kodepos')) has-error @endif">
                                                <label for="zip">ZIP</label>
                                                <input type="text" name="kodepos" class="form-control" id="zip" value="{{$pembeli->kodepos}}">

                                                 @if ($errors->has('kodepos')) <p class="help-block">{{ $errors->first('kodepos') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to cart</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">

                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            
                                             <td>Order subtotal</td>
                                            <th id="hargatotal">{{number_format($pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->keranjang[0]->id_pembeli),0)}}</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th id="ongkir" value="{{$data['ongkir']}}">{{number_format($data['ongkir'],0)}}</th>
                                        </tr>
                                       
                                        <tr class="total">
                                            <td>Total</td>
                                            <th id="finalprice" >{{number_format($pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->keranjang[0]->id_pembeli)+$data['ongkir'],0)}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
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
<script language="JavaScript" type="text/JavaScript">
    $('#kota').change( function(e){
      var id = $('option:selected', this).attr("id"); 
       var id_kota = $('option:selected', this).attr("id_kota");
   
      $('#id_kota').val(id_kota);
      console.log(id);
     
    });

     $('#provinsi').on('change', function(e){
     var id = $('option:selected', this).attr("id");  
      //ajax
      $.get('kota/' + id, function(data){  
         $('#kota').select().select('val', '');
         $('#kota').empty();
          $('#kota')
          .find('option')
          .remove()
          .end();
        $.each(data, function(index, data){
          $('#kota').append('<option value="'+data.city_name+'" id="'+data.province+'" id_kota="'+data.city_id+'">'+data.city_name+'</option>');
        });
        $('#id_kota').val(data[0].city_id)
      });
    });

    jQuery(document).ready(function($) {
    var id_provinsi;

      $.get('/laravel/public/provinsi', function(data){  
        id_provinsi=data[0].province_id;

       $.each(data, function(index, data){
           
            if('{{$pembeli->provinsi}}'==data.province){
                 $('#provinsi').append('<option value="'+data.province+'" id="'+data.province_id+'"selected>'+data.province+'</option>');
                 id_provinsi = data.province_id;
            }
            else{ $('#provinsi').append('<option value="'+data.province+'" id="'+data.province_id+'">'+data.province+'</option>');}
        });

        $.get('/laravel/public/kota/'+id_provinsi, function(data){  
        $.each(data, function(index, data){
            
             if('{{$pembeli->kota}}'==data.city_name){
                 $('#kota').append('<option value="'+data.city_name+'" id="'+data.province+'" id_kota="'+data.city_id+'"selected>'+data.city_name+'</option>');
            }
            else{ $('#kota').append('<option value="'+data.city_name+'" id="'+data.province+'" id_kota="'+data.city_id+'">'+data.city_name+'</option>');}
        });
        if('{{$pembeli->id_kota}}'!=null){
          $('#id_kota').val('{{$pembeli->id_kota}}')
      }
      else {
         $('#id_kota').val(data[0].city_id)
      }

      });
      });
      
    });

    $('form').on('keydown', 'input[type=number]', function(e) {
        if ( e.which == 38 || e.which == 40 )
            e.preventDefault();
    });

</script>
 @endsection    
 
  