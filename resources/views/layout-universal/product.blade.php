 
@extends('layout-universal.master')

@section('css')
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
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

                    <!-- *** LEFT COLUMN ***
		    _________________________________________________________ -->
               

                    <div class="col-md-9">

                        <p class="lead">{{$tampilkan[0]->produk->brand->informasi_brand}}
                        </p>
                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product detail</a>
                        </p>

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                               
                                     <img src="https://drive.google.com/uc?export=view&id={{substr($tampilkan[0]->produk->fotoproduk[0]->link_fotoproduk,33)}}" alt="" class="img-responsive">
                                     <h4 style="text-transform: uppercase" position="text-center">{{$tampilkan[0]->produk->brand->nama_brand}}</h4>
                                       <p>
                                          <div class="stars"  style="cursor: pointer;" data-id="{{$tampilkan[0]->produk->brand->id_brand}}" data-toggle="modal" data-target="#feedback-modal"> 
                                                  <div id="array{{$tampilkan[0]->produk->id_brand}}" class="hidden"> 
                                        
                                         <h2 style="text-align: center;     margin-top: -6px; margin-bottom: 4px;">{{$tampilkan[0]->produk->brand->nama_brand}}</h2>
                                         <div class="stars" style="text-align: center"  > 
                                        
                                        
                                  

                                          @for($i=0;$i<floor($tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));$i++) 
                                          
                                          <span class="star on"></span>

                                         @endfor
                                         @php 
                                         $desimal=$tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand) - floor($tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));
                                         @endphp
                                         @if ($desimal>0.0)
                                         <span class="star half"></span>
                                         @endif

                                         @for($i=0;$i<floor(5-$tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));$i++) 
                                          
                                          <span class="star"></span>

                                         @endfor

                                     

                                            </div>

                                        <label style="  display: block;  font-weight: 700 ;     font-size: x-large;     margin-bottom: 20px;
    border-bottom: 1px solid;
    border-top: 1px solid;"> Feedback</label>
                                        @foreach($tampilkan[0]->produk->brand->rating as $row)

                                        <p  style="  font-size: large; font-weight: 600; ">{{$row->transaksi->pembeli->user->username}}</p>

                                        <p style=" font-size: large; font-weight: 400;     margin-left: 25px;">{{$row->feedback}}</p>
                                        @endforeach   


                                         </div>
                                          @for($i=0;$i<floor($tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));$i++) 
                                          
                                          <span class="star on"></span>

                                         @endfor
                                         @php 
                                         $desimal=$tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand) - floor($tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));
                                         @endphp
                                         @if ($desimal>0.0)
                                         <span class="star half"></span>
                                         @endif

                                         @for($i=0;$i<floor(5-$tampilkan[0]->produk->brand->getRatarata($tampilkan[0]->produk->id_brand));$i++) 
                                          
                                          <span class="star"></span>

                                         @endfor

                                     

                                            </div>
                                          </p>  

                                </div>

                              <!--   <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div> -->
                                <!-- /.ribbon -->
<!-- 
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div> -->
                                <!-- /.ribbon -->

                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                    <form method="post" action="{{ url('/keranjang/simpan/') }}">
                                     {{ csrf_field() }}
                                        <div class="sizes text-uppercase">

                                            <h3>Available sizes</h3>
                                            
                                            @foreach($tampilkan as $ukuran)
                                            <div class="dropdown">
                                            <label >
                                                <a  href="#">{{$ukuran->nama_ukuran}}</a>
                                                <input type="checkbox"  name="size[]" value="{{$ukuran->id_ukuran}}" class="size-input">
                                            </label>

                                            <div class="dropdown-content" style=" font-size: 9px; border: solid 2px #38a7bb;color: #38a7bb;font-weight: 500;"">
                                            <p style = "margin:2px;border-bottom: solid 2px #38a7bb;color: #38a7bb;">stock</p>
                                            <p style = "margin:2px">{{$ukuran->stok_ukuran}}</p>
                                            </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <p class="price">RP {{number_format($tampilkan[0]->produk->harga,0 )}}</p>

                                        <p class="text-center">
                                        @if (auth()->user()!=null&&$belumbayar==null)
                                            <button type="submit" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                            <!-- <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                            </button> -->
                                        @endif
                                        </p>

                                    </form>
                                </div>

                                <div class="row" id="thumbs">
                                @foreach($tampilkan[0]->produk->fotoproduk as $fotoproduk )
                                    <div class="col-xs-4">
                                        <a href="https://drive.google.com/uc?export=view&id={{substr($fotoproduk->link_fotoproduk,33)}}" class="thumb">
                                             
                                             <img src="https://drive.google.com/uc?export=view&id={{substr($fotoproduk->link_fotoproduk,33)}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                @endforeach
                                
                                </div>
                            </div>

                        </div>


                        <div class="box" id="details">
                            <p>
                                <h4>Product details</h4>
                                <p>{{$tampilkan[0]->produk->detail_produk}}</p>
                               
                                @if($tampilkan[0]->produk->potonganharga != null)
                                <blockquote>
                                    <p><em>This product can get discount if product is bought {{$tampilkan[0]->produk->startpotongan}} pieces and then can get discount again each product quantity increase {{$tampilkan[0]->produk->kelipatanpotongan}} pieces. The discount is {{$tampilkan[0]->produk->potonganharga}} % per piece
                                    and will increase {{$tampilkan[0]->produk->potonganharga}} % each increase {{$tampilkan[0]->produk->kelipatanpotongan}} pieces.</em>
                                    </p>
                                </blockquote>
                                @endif
                        </div>

                       <!--  <div class="box social" id="product-social">
                            <h4>Show it to your friends</h4>
                            <p>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div> -->

                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="box text-uppercase">
                                    <h3>You may also like these products</h3>
                                </div>
                            </div>
   @foreach ($like as $row) 
                            <div class="col-md-3">
                                <div class="product">
                                    <div class="image">
                                        <a href="{{url('product/'.$row->id_produk)}}">
                                        <img src="https://drive.google.com/uc?export=view&id={{substr($row->fotoproduk[0]->link_fotoproduk,33)}}" alt="loading" class="img-responsive image1">
                                           
                                        </a>
                                    </div>
                                    <div class="text">
                                        <a style="text-transform: uppercase">{{$row->brand->nama_brand}}</a>
                                        <h3><a href="{{url('product/'.$row->id_produk)}}">{{$row->nama_produk}}</a></h3>
                                        <p class="price">Rp{{number_format($row->harga,0)}}</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                            @endforeach

                        </div>

                                                 <div class="modal fade" id="feedback-modal" tabindex="-1" role="dialog" aria-labelledby="feedback" aria-hidden="true">
            <div style="width: 50%;" class="modal-dialog modal-sm-12">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align: center;" id="feedback">RATING</h4>
                    </div>
                    <div class="modal-body" id="feedback-body">
                  
                    
                   
                    </div>
                </div>
            </div>
        </div>
                       

                    </div>
                    <!-- /.col-md-9 -->
  @include('.layout-universal.sidebar')

                    <!-- *** LEFT COLUMN END *** -->


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
                  $('#feedback-modal').on('shown.bs.modal', function (e) {
  var button = $(e.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id')
  $('#feedback-body').html($('#array'+recipient).html())
  console.log($('#array'+recipient).html());
})
            </script>
              @endsection