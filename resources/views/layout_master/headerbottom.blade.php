
<div class="header-bottom"><!--header-bottom-->
 <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav">

                        <li><a href="{{ url('machikokstore') }}">Produk</a></li>
                        <li ><a href="{{ url('cekongkir') }}">Ongkos Kirim</a></li>
                        <li><a href="{{ url('testimoni') }}">Testimoni</a></li>
                        <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                        <!-- <li><a href="{{ url('faq') }}">Bantuan</a></li> -->
                        <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Bantuan </span><b class="caret"></b></a>
                                <ul class="dropdown-menu" style="    background: none repeat scroll 0 0 #F09BA0;">
                                    <li><a href="{{ url('faq') }}">Bantuan</a></li>
                                    
                                    <li><a href="{{ url('syarat') }}">Syarat & ketentuan </a></li>
                                    <!-- <li><a href="{{ url('status_pesan') }}">Status pemesanan</a></li> -->
                                   
                                    </ul>

                            </li>
                        <li>
                            <div class="col-sm-4" style="float:right" >
                                <form action="{{ url('pencarian') }}" method="GET" style="margin-top:8px; width:300px">
                                    <div class="input-group">
                                        <input type="search" name="cari" class="form-control" placeholder="Cari Produk..."/>
                                        <span class="input-group-btn">
                                        <button type='submit'  class="btn btn-flat" style="padding:7px 20px;"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form> 
                            </div>
                        </li>
                        <!-- <li>
                            
                                    <a href="{{ url('wishlist') }}" ><i class="fa fa-heart" color="#0000" ></i></a>
                            
                        </li> -->
<!--                         <li>
                            
                                    <a href="{{ url('keranjang') }}"><i class="fa fa-shopping-cart" color="#0000" ></i></a>

                        </li>
 -->                       <!--  <li>
                            <a href="#"><img src="machikoo/img/user.jpg" width="20px" height="20px"></a>
                        </li> -->
                    <!-- <li class="dropdown user user-menu" >
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                            <img src="{{asset("vendor/machikoo/img/user.jpg")}}" width="20px" height="20px">
                        </a>
                        <ul class="dropdown-menu" style="background:#F09BA0">
                        
                            <li ><a href="#">Profil</a></li>
                            <li ><a href="#">Konfirmasi Pembayaran</a></li>
                            <li><a href="#">Status Pemesanan</a></li>
                            <li><a href="#">Keluar</a></li>
                            
                        </ul>
                    </li> -->
                    <!-- <li><a href="{{ url('daftar') }}">Daftar</a></li>
                    <li><a href="{{ url('masuk') }}">Masuk</a></li> -->
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
</div><!--/header-bottom-->