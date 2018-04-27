@extends('layout-universal.master')

@section('css')

@endsection
@section('content')
@section('active',"active")




        <div id="content">
            <div class="container">

                <div class="row">

                @include('.layout-universal.sidebar')
               
                    <div class="col-sm-9">

                       <p style="margin-bottom: 15px; text-align: justify;"  class="text-muted lead">{{$id_produk[0]->informasi_brand}}</p>


                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{url('article/brand/'.$id_produk[0]->brand->nama_brand)}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Article</a>
                                    </div>
                                    
                                    <div class="pull-right">
                                        <a  href="{{url('video/brand/'.$id_produk[0]->brand->nama_brand)}}" class="btn btn-template-main">Video<i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <br/>
                                <br/>

                        <p style="margin-top: 20px" class="text-muted lead">PRODUCTS</p>

                        <div class="row products">
                        @foreach ($product as $product) 
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="{{url('product/'.$product->id_produk)}}">
                                            <img src="https://drive.google.com/uc?export=view&id={{substr($product->fotoproduk[0]->link_fotoproduk,33)}}" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <!-- /.image -->
                                    <div class="text">
                                        <a style="text-transform: uppercase"  href="{{url('product/'.$product->id_produk)}}">{{$product->brand->nama_brand}}</a> 
                                          <p>
                                          <div class="stars"  style="cursor: pointer;" data-id="{{$product->id_brand}}" data-toggle="modal" data-target="#feedback-modal"> 
                                        
                                         <div id="array{{$product->id_brand}}" class="hidden"> 
                                        
                                         <h2 style="text-align: center;     margin-top: -6px; margin-bottom: 4px;">{{$product->brand->nama_brand}}</h2>
                                         <div class="stars" style="text-align: center"  > 
                                        
                                        
                                  

                                          @for($i=0;$i<floor($product->brand->getRatarata($product->id_brand));$i++) 
                                          
                                          <span class="star on"></span>

                                         @endfor
                                         @php 
                                         $desimal=$product->brand->getRatarata($product->id_brand) - floor($product->brand->getRatarata($product->id_brand));
                                         @endphp
                                         @if ($desimal>0.0)
                                         <span class="star half"></span>
                                         @endif

                                         @for($i=0;$i<floor(5-$product->brand->getRatarata($product->id_brand));$i++) 
                                          
                                          <span class="star"></span>

                                         @endfor

                                     

                                            </div>

                                        <label style="  display: block;  font-weight: 700 ;     font-size: x-large;     margin-bottom: 20px;
    border-bottom: 1px solid;
    border-top: 1px solid;"> Feedback</label>
                                        @foreach($product->brand->rating as $row)

                                        <p  style="  font-size: large; font-weight: 600; ">{{$row->transaksi->pembeli->user->username}}</p>

                                        <p style=" font-size: large; font-weight: 400;     margin-left: 25px;">{{$row->feedback}}</p>
                                        @endforeach   


                                         </div>
                                  

                                          @for($i=0;$i<floor($product->brand->getRatarata($product->id_brand));$i++) 
                                          
                                          <span class="star on"></span>

                                         @endfor
                                         @php 
                                         $desimal=$product->brand->getRatarata($product->id_brand) - floor($product->brand->getRatarata($product->id_brand));
                                         @endphp
                                         @if ($desimal>0.0)
                                         <span class="star half"></span>
                                         @endif

                                         @for($i=0;$i<floor(5-$product->brand->getRatarata($product->id_brand));$i++) 
                                          
                                          <span class="star"></span>

                                         @endfor

                                     

                                            </div>
                                          </p>  
                                        <h3><a href="{{url('product/'.$product->id_produk)}}">{{$product->nama_produk}}</a></h3>

                                        <p class="price">Rp{{number_format($product->harga,0 )}}</p>
                                        <p class="buttons">
                                            <a href="{{url('product/'.$product->id_produk)}}" class="btn btn-default">View detail</a>
                                            <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
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
                          <!--   <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="image">
                                        <a href="product">
                                        
                                            <img src="https://drive.google.com/uc?export=view&id={{substr('https://drive.google.com/open?id=1sfhxVF8Lj1ZPDm20fjI-IQ6iJDj8hXlh',33)}}" alt="" class="img-responsive image1">
                                        </a>
                                    </div> -->
                                    <!-- /.image -->
                                    <!-- <div class="text">
                                        <h3><a href="product">White Blouse Armani</a></h3>
                                        <p class="price"><del>$280</del> $143.00</p>
                                        <p class="buttons">
                                            <a href="product" class="btn btn-default">View detail</a>
                                            <a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </p>
                                    </div> -->
                                    <!-- /.text -->

                                    <!-- <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div> -->
                                    <!-- /.ribbon -->

                                    <!-- <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div> -->
                                    <!-- /.ribbon -->
                                <!-- </div> -->
                                <!-- /.product -->
                           <!--  </div> -->


                        <div class="row">

                            <div class="col-md-12 banner">
                                <a href="#">
                                    <img src="{{url('universal/img/banner2.jpg')}}" alt="" class="img-responsive">
                                </a>
                            </div>

                        </div>


                        <div class="pages">

                            <p class="loadMore">
                                <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
                            </p>

                            <ul class="pagination">
                                <li><a href="#">&laquo;</a>
                                </li>
                                <li class="active"><a href="#">1</a>
                                </li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** RIGHT COLUMN END *** -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->

        
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