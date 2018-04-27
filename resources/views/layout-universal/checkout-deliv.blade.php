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

                            <form method="post" action="{{url('ongkir/simpan')}}">
                            {{ csrf_field() }}
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('alamat')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                                    </li>
                                    <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>

                                                <h4 class="text-uppercase">JNE (DELIVERY TO {{$pembeli->kota}})</h4>

                                                <p>Get it right on next day - fastest option possible.</p>

                                                <div class="box-footer text-center">
                                                    <table class="table" style="text-transform: none;">
                                                      <thead>
                                                        <tr>
                                                          <th></th>
                                                          <th>Jenis</th>
                                                          <th>Deskripsi</th>
                                                          <th>Estimasi Waktu Pengiriman</th>
                                                          <th>Harga</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody class="tabelBodyjne">
                                                        <td colspan="5" style="color: black; font-size:15px">Anda belum memilih kurir</td>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                     <!--    <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>POS Indonesia</h4>

                                                <p>Get it right on next day - fastest option possible.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="delivery2">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="box shipping-method">

                                                <h4>TIKI</h4>

                                                <p>Get it right on next day - fastest option possible.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="delivery" value="delivery3">
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('alamat')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Continue to Payment Method<i class="fa fa-chevron-right"></i>
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
                                            <th id ="totalorder" value="{{$pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->keranjang[0]->id_pembeli)}}">{{number_format($pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->keranjang[0]->id_pembeli),0)}}</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th id="ongkir" value="{{$data['ongkir']}}">{{number_format($data['ongkir'],0)}}</th>
                                        </tr>
                                       
                                        <tr class="total">
                                            <td>Total</td>
                                            <th id="final" >{{number_format($pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->keranjang[0]->id_pembeli)+$data['ongkir'],0)}}</th>
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
<script type="text/javascript">
function formatNumber (num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
   $(document).ready(function(){
    
   
      
        var service, des, etd, value;
        $('.tabelBodyjne').empty();
        $('.tabelBodyjne').append('<tr><td colspan="5" style="color: black; font-size:15px">Proses mengambil data ...</td></tr>');
        $.get("kurir/",
          function(data){
              $('.tabelBodyjne').empty();
              console.log(data);
              $.each(data, function(index, data){
       
                if(data.costs.length == 0){
                  $('.tabelBodyjne').append('<tr><td colspan="5" style="color: black; font-size:15px">Delivery to destination not available</td></tr>'+
                  '<tr><td colspan="5" style="color: black; font-size:15px">Call on this number 087776671413</td></tr>')
                }else{
                  $.each(data.costs, function(index, data){
                    service = data.service;

                    des = data.description;
                    $.each(data.cost, function(index, data){

                      
                      if(des.indexOf('Surat') == -1 && service.indexOf('Dokumen') == -1 ){
                        $('.tabelBodyjne').append(
                        '<tr><td><input type="radio" name="ongkir" value="'+data.value+'" class="ongkir"  metode="'+service+'"></td>'+
                        '<td style="color:#000">'+service+' '+'</td>'+
                        '<td>'+des+'</td>'+
                        '<td>'+data.etd+' hari</td>'+
                        '<td>'+formatNumber(data.value)+'</td></tr>'
                        );
                      }
                    }); 
                  }); 
                }
          $('.tabelBodyjne').append( 
              "<tr><td colspan='5'style='text-align:left'>@if ($errors->has('ongkir')) <p class='help-block' style='color:#a94442'>{{ $errors->first('ongkir') }}</p> @endif</td></tr>"
              )
              });
              
          });
    })
   $(document).on('change','.ongkir',function(){
    $('#ongkir').text(formatNumber($(this).val()));
    $('#ongkir').attr('value',$(this).val());
    $('#final').text(formatNumber(parseInt($('#totalorder').attr('value'))+parseInt($(this).val())));
    console.log($(this).val());
   })
</script>
@endsection