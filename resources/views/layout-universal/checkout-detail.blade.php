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
                        @if($detail_transaksi==null||count($detail_transaksi)==0)
                          <h3 style="text-align: center;">YOU DONT HAVE ANY TRANSACTION</h3>
                          @else
                           <form method="post" action="{{url('review/simpan')}}">
                                {{ csrf_field() }}
                              

                                <div class="content">
                                 <div class="box-header">
                                 @if($detail_transaksi!=null)
                                   
                                <h3>YOUR CODE : {{$detail_transaksi[0]->transaksi->kode}} <span style="float: right; font-size: medium;"><small>Your time left to Transfer is : </small><span id="waktu"  style="margin:0; margin-bottom:6px"></span></span></h3>
                                @if($detail_transaksi[0]->transaksi->status=="menunggu pembayaran")
                                <h5>Transfer Now <span style="float: right;">DELIVERY TO {{$detail_transaksi[0]->transaksi->pengiriman->kota}}</span></h5>
                                @else 
                                <h5>WAITING FOR APPROVAL<span style="float: right;">DELIVERY TO {{$detail_transaksi[0]->transaksi->pengiriman->kota}}</span></h5>
                                @endif
                                <h5 style=" font-size: x-small;">{{$detail_transaksi[0]->transaksi->rekening->nama_bank}} <span style="float: right; font-size: x-small;">{{$detail_transaksi[0]->transaksi->pengiriman->alamat}}</span></h5>
                                <h5 style=" font-size: x-small;">{{$detail_transaksi[0]->transaksi->rekening->atasnama}} {{$detail_transaksi[0]->transaksi->rekening->no_rek}} </h5>
                                @endif

                               
                            </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit price</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($detail_transaksi!=null)
                                        @foreach($detail_transaksi as $row)
                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="https://drive.google.com/uc?export=view&id={{substr($row->ukuran->produk->fotoproduk[0]->link_fotoproduk,33)}}" alt="loading">
                                                        </a>
                                                    </td>
                                                    <td><a href="#">{{$row->ukuran->produk->nama_produk}}</a><a class="text-uppercase"> {{$row->ukuran->nama_ukuran}}</a>
                                                    </td>
                                                    <td>{{$row->jumlah}}</td>
                                                    <td>{{number_format($row->ukuran->produk->harga,0)}}</td>
                                                    <td>{{number_format($row->diskon,0)}}</td>
                                                    <td>{{number_format($row->total_harga,0)}}</td>
                                                </tr>
                                        @endforeach
                                               @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    @if($detail_transaksi!=null)
                                                    <th>{{number_format($detail_transaksi[0]->transaksi->total_harga,0)}}</th>
                                                    @endif
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.content -->
                                @if($detail_transaksi!=null)
                                <div class="box-footer">
                                @if($detail_transaksi[0]->transaksi->status=="menunggu pembayaran")
                                    <div class="pull-left">

                                        <a href="{{url('destroy/'.$detail_transaksi[0]->id_transaksi)}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Cancel Transaction</a>
                                    </div>

                                    <div class="pull-right">
                                        <a   href="{{url('konfirmasi')}}" class="btn btn-template-main">Go to payment confirmation<i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                @endif
                                </div>
                                @endif
                            </form>
                        @endif
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->
                    @if($detail_transaksi!=null)
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
                                             <th id ="totalorder"  >{{number_format($detail_transaksi[0]->transaksi->total_harga,0)}}</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                             <th id="ongkir" ">{{number_format($detail_transaksi[0]->transaksi->pengiriman->ongkir,0)}}</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                             <th id="final">{{number_format($detail_transaksi[0]->transaksi->total_harga+$detail_transaksi[0]->transaksi->pengiriman->ongkir,0)}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    @endif
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

<script>
@if($detail_transaksi!=null)
if('{{$detail_transaksi[0]->transaksi->status}}'=='menunggu admin'){
        clearInterval(x);
        document.getElementById("waktu").innerHTML = "COMPLETE";
    }
else{

// Set the date we're counting down to
var countDownDate = new Date("{{\Carbon\Carbon::parse($detail_transaksi[0]->transaksi->created_at)->addHours(2)}}").getTime();
console.log(countDownDate);

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("waktu").innerHTML = hours + " : "
    + minutes + " : " + seconds;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("waktu").innerHTML = "END";
        window.location="{{url('destroy/'.$detail_transaksi[0]->id_transaksi)}}";
    

    }
    
}, 1000);
}
@endif
</script>
@endsection
