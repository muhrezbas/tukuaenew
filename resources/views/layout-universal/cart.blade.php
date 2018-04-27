
@extends('layout-universal.master')

@section('css')
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
        font-size: 9px;
    border: solid 2px #38a7bb;
    color: #38a7bb;
    font-weight: 500;
    width: 55%;
    margin-left: 23%;
    text-align: center;
    position: absolute;
    
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
@endsection
@section('content')
@section('active',"active")

 <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead" id="jumlahbarang">You currently have {{$keranjang->sum('jumlah')}} item(s) in your cart.</p>
                    </div>


                    <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                            <form method="get" action="alamat">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $totalharga=0; @endphp
                                        @foreach($keranjang as $data)
                                        @php $totalharga=$totalharga+$data->ukuran->produk->harga*$data->jumlah; @endphp
                                            <tr id="keranjang{{$data->id_keranjang}}">
                                                <td>
                                                    <a href="#">
                                                        <img src="https://drive.google.com/uc?export=view&id={{substr($data->ukuran->produk->fotoproduk[0]->link_fotoproduk,33)}}" alt="loading">
                                                    </a>
                                                </td>
                                                 
                                                  <td>
                                                  
                                                  <a href="#">{{$data->ukuran->produk->nama_produk}}</a><a class="text-uppercase"> {{$data->ukuran->nama_ukuran}}</a>
                                                
                                            
                                            </td>
                                               
                                                <td> 
                                                <div class="dropdown">
                                           
                                                    <input  max="{{$data->ukuran->stok_ukuran+$data->jumlah}}" style="width: 65px;" type="number" value="{{$data->jumlah}}" jumlah='{{$data->jumlah}}' class="form-control kuantitas" id='{{$data->id_keranjang}}'>
                                                 <div class="dropdown-content" style=" font-size: 9px; border: solid 2px #38a7bb;color: #38a7bb;font-weight: 500;">
                                            <p style = "margin:2px;border-bottom: solid 2px #38a7bb;color: #38a7bb;">stock</p>
                                            <p id="stok{{$data->id_keranjang}}" style = "margin:2px">{{$data->ukuran->stok_ukuran}}</p>
                                            </div>
                                            </div>
                                                </td>
                                                <td>{{number_format($data->ukuran->produk->harga,0)}}</td>
                                                <td id="diskon{{$data->id_keranjang}}">{{number_format($data->diskon($data->id_keranjang),0)}}</td>
                                                <td  id="total{{$data->id_keranjang}}">{{number_format(($data->ukuran->produk->harga*$data->jumlah)-$data->diskon($data->id_keranjang),0)}}</td>
                                                <td><a class="delete" id_keranjang='{{$data->id_keranjang}}' href="#"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            @if(count($keranjang)!=0)
                                                <th colspan="5">Total</th>
                                                <th totalharga="{{$totalharga}}" class="totalharga" id="totalharga" colspan="2">{{number_format($totalharga-$data->totalDiskon($data->id_pembeli),0)}}</th>
                                            @endif
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('/')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                    </div>
                                    <div class="pull-right">
                                        @if(count($keranjang)!=0)
                                        <button type="submit" id="buttonCheckout" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                        @endif
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.box -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="box text-uppercase">
                                    <h3>You may also like these products</h3>
                                </div>
                            </div>
                             @foreach ($product as $row) 
                            <div class="col-md-3">
                                <div class="product">
                                    <div class="image">
                                        <a  href="{{url('product/'.$row->id_produk)}}">
                                        <img src="https://drive.google.com/uc?export=view&id={{substr($row->fotoproduk[0]->link_fotoproduk,33)}}" alt="loading" class="img-responsive image1">
                                           
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a style="text-transform: uppercase">{{$row->brand->nama_brand}}</a>
                                        <h3><a href="shop-detail.html">{{$row->nama_produk}}</a></h3>
                                        <p class="price">Rp{{number_format($row->harga,0)}}</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                            @endforeach


                        </div>

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
                                             @if(count($keranjang)!=0)

                                            <th id="hargatotal">{{number_format($totalharga-$data->totalDiskon($data->id_pembeli),0)}}</th>
                                            @else
                                            <th> 0</th>
                                            @endif
                                        </tr>
                                        <tr>
                                       
                                            <td>Shipping and handling</td>
                                              @if(count($keranjang)!=0)
                                            <th id="ongkir" value="{{$dataongkir['ongkir']}}">{{number_format($dataongkir['ongkir'],0)}}</th>
                                            @else
                                            <th> 0</th>
                                        @endif
                                        </tr>
                                       
                                        <tr class="total">
                                            <td>Total</td>
                                            @if(count($keranjang)!=0)
                                            <th id="finalprice" totalharga='{{$totalharga}}'>{{number_format($totalharga-$data->totalDiskon($data->id_pembeli)+$dataongkir['ongkir'],0)}}</th>
                                            @else
                                            <th> 0</th>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>



                    </div>
                    <!-- /.col-md-3 -->

                </div>

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


     $('.kuantitas').change(function(){ 
        var id =  $(this).attr('id');
       
 $.get('keranjang/update/' + $(this).attr('id') + '/' + $(this).val(), function(data){
    if(data == 'stok tidak cukup'){
        alert('stok tidak cukup');

       $(this).val('5');
    } else{
        $('#total' + id).text((parseInt(data[1])*parseInt(data[2])-parseInt(data[5])).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
     $('#diskon' + id).text((data[5]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        $('.totalharga').text(data[6].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#hargatotal').text(data[6].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        $('#finalprice').text(data[6].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

       
        $('#jumlahbarang').text('You currently have '+ data[3] +' item(s) in your cart.');  
        $('#stok'+id).text(data[4]);
        console.log(data[6]);
    } 
                 

        });
      
  })
      $('.delete').click(function(){ 
         var id =  $(this).attr('id_keranjang') 
 $.get('keranjang/delete/' + $(this).attr('id_keranjang'), function(data){  
        $('#keranjang' + id).remove();
          $('.totalharga').text(data[1].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#hargatotal').text(data[1].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        $('#finalprice').text(data[1].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


          $('#totalharga').attr('totalharga', totalharga +parseInt(data[0]))
          $('#finalprice').attr('totalharga', totalharga +parseInt(data[0]))
         $('#jumlahbarang').text('You currently have ' + data[2] +' item(s) in your cart.');
         if(data[1]==0){
            $('#buttonCheckout').remove();
         }        
        });
      
  })
</script>
@endsection