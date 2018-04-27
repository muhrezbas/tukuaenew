@extends('layout-universal.master')

@section('css')
<style type="text/css">
    .show-result {
  margin: 10px;
  padding: 10px;
  color: green;
  font-size: 20px;
}

.star-rating s:hover,
.star-rating s.active {
    color: gold;
}
.star-rating-rtl s:hover,
.star-rating-rtl s.active {
    color: red;
}

.star-rating s,
.star-rating-rtl s {
    color: gray;
    font-size: 50px;
    cursor: default;
    text-decoration: none;
    line-height: 50px;
}
.star-rating {
    padding: 2px;
}
.star-rating-rtl {
    background: #555;
    display: inline-block;
    border: 2px solid #444;
}
.star-rating-rtl s {
    color: yellow;
}
.star-rating s:hover:before,
.star-rating s.rated:before,
.star-rating s.active:before {
    content: "\2605";
}
.star-rating s:before {
    content: "\2606";
}
.star-rating-rtl s:hover:after,
.star-rating-rtl s.rated:after,
.star-rating-rtl s.active:after {
    content: "\2605";
}

.star-rating-rtl s:after {
    content: "\2606";
}
</style>
@endsection
@section('content')
@section('active',"active")
  <div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-12 clearfix" id="checkout">

                        <div class="box">
                          @if($transaksi==null||count($transaksi)==0)
                          <h3 style="text-align: center;">YOU DONT HAVE ANY HISTORY</h3>
                          @else

                             @foreach($transaksi as $index=>$transaksi) 

                                <div  class="content">
                                
                                 <div class="box-header">
                                 @if($transaksi!=null)
                                <div class="modal fade" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="rating" aria-hidden="true">
            <div style="width: 30%;" class="modal-dialog modal-sm-12">

                <div class="modal-content" style="text-align: center;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="rating">RATING BRAND BELOW</h4>

                    </div>
                    <div class="modal-body">

                  
                    
                   
                    </div>
                </div>
            </div>
        </div>
         
                                <h3>YOUR CODE : {{$transaksi->kode}} </h3>
                                @if($transaksi->status=="menunggu pembayaran")
                                <h5>Transfer Now <span style="float: right;">DELIVERY TO {{$transaksi->pengiriman->kota}}</span></h5>
                                @elseif($transaksi->status=="telah dibayar")
                                <h5>currently processing <span style="float: right;">DELIVERY TO {{$transaksi->pengiriman->kota}}</span></h5>
                                @elseif($transaksi->status=="proses kirim")
                                <h5>delivery to destination <span style="float: right;">DELIVERY TO {{$transaksi->pengiriman->kota}}</span></h5>
                                @elseif($transaksi->status=="telah sampai")
                                <h5>done <span style="float: right;">DELIVERY TO {{$transaksi->pengiriman->kota}}</span></h5>
                                @elseif($transaksi->status=="gagal")
                                <h5>failed<span style="float: right;">DELIVERY TO {{$transaksi->pengiriman->kota}}</span></h5>

                                @endif
                                <h5 style=" font-size: x-small;">{{$transaksi->rekening->nama_bank}} <span style="float: right; font-size: x-small;">{{$transaksi->pengiriman->alamat}}  <h5 style=" font-size: x-small;">@if ($transaksi->pengiriman->no_resi != 0 )
                                your receipt number : {{$transaksi->pengiriman->no_resi}} </h5>
                                @endif</span></h5>
                                <h5 style=" font-size: x-small;">{{$transaksi->rekening->atasnama}} {{$transaksi->rekening->no_rek}} </h5>


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
                                            @if($transaksi!=null)
                                        @foreach($transaksi->detail_transaksi as $row)
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
                                                    @if($transaksi!=null)
                                                    <th>{{number_format($transaksi->total_harga,0)}}</th>
                                                    @endif
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.content -->
                               
                            @if($transaksi!=null)
                                <div style="margin-bottom: 10px;" class="box-footer">
                                   @if(count($transaksi->rating)==0)
                                    <div class="pull-right">

                                        <a   data-id="{{$transaksi->id_transaksi}}" data-toggle="modal" data-target="#rating-modal" class="btn btn-template-main">Rating<i class="fa fa-chevron-right"></i>

                                        
                                        </a>
                                        <div id="array{{$transaksi->id_transaksi}}" class="hidden">
                                        <form method="post" action="{{ url('rate/'.$transaksi->id_transaksi) }}" style="margin-left:10px">
                                         {{ csrf_field() }}
                                        @foreach($transaksi->getBrand($transaksi->id_transaksi) as $rating) 
                                         
                                           
                                            <h2>{{$rating->nama_brand}}</h2>
                                            <div class="star-rating"><s id_brand="{{$rating->id_brand}}"><s id_brand="{{$rating->id_brand}}"><s id_brand="{{$rating->id_brand}}"><s id_brand="{{$rating->id_brand}}"><s id_brand="{{$rating->id_brand}}"></s></s></s></s></s></div>
                                            <input type="hidden" name="rating[]" class ="rating{{$rating->id_brand}}" value="0">
                                            <input type="hidden" name="id_brand[]"  value="{{$rating->id_brand}}">
                                            <div class="show-result{{$rating->id_brand}}">No stars selected yet.</div>
                                           
                                            <label style="    font-weight: 700;"> Feedback</label>
                                                <input type="text" class="form-control" name="feedback[]" placeholder="feedback" required>
                                           
                                           

                                            <br/>
                                        @endforeach
                                        <button type="submit" class="btn btn-template-main">Rate</button>
                                        </form>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                <br/>
                            @endforeach

                            @endif      
                        </div>
                        <!-- /.box -->
                      

                    </div>
                    <!-- /.col-md-9 -->
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
  $('#rating-modal').on('shown.bs.modal', function (e) {
  var button = $(e.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id')
  $('.modal-body').html($('#array'+recipient).html())
  console.log($('#array'+recipient).html());
})
  $(function() {
    $(document).on("click", "div.star-rating > s, div.star-rating-rtl > s", function(e) {
        var id_brand = $(this).attr('id_brand');
       
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on


        var numStars = $(e.target).parentsUntil("div").length+1;
 
        $('.show-result'+id_brand).text(numStars + (numStars == 1 ? " star" : " stars!"));
         $('.rating'+id_brand).val(numStars);

    });
});
    </script>
@endsection
