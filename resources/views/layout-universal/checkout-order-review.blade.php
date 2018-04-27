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
                           <form method="post" action="{{url('review/simpan')}}">
                                {{ csrf_field() }}
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('alamat')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                                    </li>
                                    <li><a href="{{url('ongkir')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                    </li>
                                    <li><a href="{{url('bayar')}}"><i class="fa fa-money"></i><br>Payment Method</a>
                                    </li>
                                    <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                    </li>
                                </ul>

                                <div class="content">
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
                                        @foreach($pembeli->keranjang as $row)
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
                                                    <td >{{number_format($row->diskon($row->id_keranjang),0)}}</td>
                                                    <td>{{number_format(($row->ukuran->produk->harga*$row->jumlah)-$row->diskon($row->id_keranjang),0)}}</td>
                                                </tr>
                                        @endforeach
                                               
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Total</th>
                                                    <th>{{number_format($row->total($row->id_pembeli)-$row->totalDiskon($row->id_pembeli),0)}}</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('bayar')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Place an order<i class="fa fa-chevron-right"></i>
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