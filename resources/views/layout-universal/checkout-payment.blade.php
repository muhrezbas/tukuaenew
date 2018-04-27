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
                            <form method="post" action="{{url('bayar/simpan')}}">
                                {{ csrf_field() }}
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('alamat')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                                    </li>
                                    <li><a href="{{url('ongkir')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                    </li>
                                    <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                    </li>
                                    <li class="disabled"><a href="shop-checkout4.html"><i class="fa fa-eye"></i><br>Order Review</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                         

                                                <h4>Transfer</h4>

                                               <p> Currently payments can only be made through ATM transfers.</p>

                                                <p>Please make payment with maximum time of 1 × 2 hours after ordering.</p>

                                                <p>Please make a Confirmation after paid when maximum time payment equal to maximum payment time.</p>

                                                <p>The reservation will be automatically canceled if it exceeds the maximum deadline.</p>
                                                
                                               
                                                @foreach ($rekening as $item)
                                                <div class="box-footer text-uppercase">
                                                    
                                             
                                                <div class="radio" style=" padding: 16px; margin:16px 0">
                                                <label  style="width: 100%">
                                                            <input type="radio" name="id_rekening" id="optionsRadios1" value="{{$item->id_rekening}}" 
                                                          <span><a style="font-size: 20px; color: black;">{{$item->no_rek}} A.N {{$item->atasnama}}
                                                            <span style="float:right">  {{$item->nama_bank}}</span>
                                                          </a></span>
                                                        </label>
                                                      </div>
                                                </div>
                                                @endforeach
                                            @if ($errors->has('id_rekening')) <p class="help-block" style="margin-top:25px; margin-bottom: -25px; color:#a94442">{{ $errors->first('id_rekening') }}</p> @endif
                                        </div>
                                    
                                    </div>

                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('ongkir')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Continue to Order review<i class="fa fa-chevron-right"></i>
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